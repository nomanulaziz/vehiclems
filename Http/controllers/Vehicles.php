<?php
namespace Http\Controllers;

use Core\App;
use Core\Database;
use Core\Validator;

class Vehicles
{
    protected $db = null;
    protected $currentUserId = 4;

    public function __construct() 
    {
        $this->db = App::resolve(Database::class);
        
    }

    // ========================================================
    // Function to Display all Vehicle
    // ========================================================
    public function index()
    {
        // dd($this->db->query('select * from vehicles'));
        $vehicles = $this->db->query('select * from vehicles where created_by = 4')->get();
        
        view('vehicles/index.view.php', [
            'heading' => 'My Vehicles',
            'vehicles' => $vehicles
        ]);
    }

    // ========================================================
    // Function to Display a Vehicle Detail
    // ========================================================
    public function show()
    {
        // dd($db->query('select * from vehicles'));
        $vehicle = $this->db->query('select * from vehicles where id = :id', [
            'id' => $_GET['id']
        ])->findOrFail();
            
        
        authorize($vehicle['created_by'] == $this->currentUserId);
        
        view('vehicles/show.view.php', [
            'heading' => 'Showing Vehicle Information',
            'vehicle' => $vehicle
        ]);
    }

    // ========================================================
    // Function to show create Vehicle Form
    // ========================================================
    public function create()
    {
        view('vehicles/create.view.php', [
            'heading' => 'Add New Vehicle',
            'errors' => []
        ]);
    }

    // ========================================================
    // Function to insert new Vehicle to the database
    // ========================================================
    public function store()
    {
        $errors = [];

        //check for empty fields
        !Validator::string(value: $_POST['name'], min: 1, max: 100) ? $errors['name'] = 'Name between length of 3-100 is required' : '' ;
        !Validator::string(value: $_POST['price'], min: 1, max: 20) ? $errors['price'] = 'Price is required' : '' ;
        !Validator::string(value: $_POST['makeYear'], min: 1, max: 4) ? $errors['makeYear'] = 'Valid Year is required' : '' ;
        !Validator::string(value: $_POST['color'], min: 1, max: 100) ? $errors['color'] = 'Color is required' : '' ;

        if (! empty($errors)) {
            //validation issue
            return view('vehicles/create.view.php', [
                'heading' => 'Add New Vehicle',
                'errors' => $errors
            ]);
        }

        $this->db->query('INSERT INTO vehicles(name, price, make_year, color, vehicle_type_id, created_by) VALUES(:name, :price, :make_year, :color, :vehicle_type_id, :created_by)', [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'make_year' => $_POST['makeYear'],
            'color' => $_POST['color'],
            'vehicle_type_id' => 1,
            'created_by' => $this->currentUserId,
        ]);

        header('location: /vehicles');
        die();

    }

    // ========================================================
    // Function to open edit page for vehicle
    // ========================================================
    public function edit()
    {
        

        // dd($this->db->query('select * from vehicles'));
        $vehicle = $this->db->query('select * from vehicles where id = :id', [
            'id' => $_GET['id']
        ])->findOrFail();


        authorize($vehicle['created_by'] == $this->currentUserId);

        view('vehicles/edit.view.php', [
            'heading' => 'Edit Vehicle Details',
            'errors' => [],
            'vehicle' => $vehicle
        ]);
    }

    // ========================================================
    // Function to Update the Vehicle Data
    // ========================================================
    public function update()
    {
        // === find the corresponding vehicle ===
        $vehicle = $this->db->query('select * from vehicles where id = :id', [
        'id' => $_POST['id']
        ])->findOrFail();


        // === check user authorization ===
        authorize($vehicle['created_by'] == $this->currentUserId);

        // === validate the input ===
        $errors = [];

        //check for empty fields
        !Validator::string(value: $_POST['name'], min: 1, max: 100) ? $errors['name'] = 'Name between length of 3-100 is required' : '' ;
        !Validator::string(value: $_POST['price'], min: 1, max: 20) ? $errors['price'] = 'Price is required' : '' ;
        !Validator::string(value: $_POST['makeYear'], min: 1, max: 4) ? $errors['makeYear'] = 'Valid Year is required' : '' ;
        !Validator::string(value: $_POST['color'], min: 1, max: 100) ? $errors['color'] = 'Color is required' : '' ;

        if (count($errors)) {
            //validation issue
            return view('vehicles/edit.view.php', [
                'heading' => 'Edit Vehicle Details',
                'errors' => $errors,
                'vehicle' => $vehicle
            ]);
        }

        // === if no validation update the record ===
        $rowsAffected = $this->db->query('UPDATE vehicles SET name = :name, price = :price, make_year = :make_year, color = :color WHERE id = :id', [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'make_year' => $_POST['makeYear'],
            'color' => $_POST['color'],
        ]);

        // === redirect ===
        if($rowsAffected > 0) {
            header('location: /vehicles');
            die();
        } else {
            echo "Database Exception: Record not updated";
        }

    }

    // ========================================================
    // Function to Delete the Vehicle
    // ========================================================
    public function destroy()
    {
        $vehicle = $this->db->query('select * from vehicles where id = :id', [
        'id' => $_POST['id']
        ])->findOrFail();
            
            
        authorize($vehicle['created_by'] == $this->currentUserId);

        //form submitted delete the note.
        $this->db->query('delete from vehicles where id = :id', [
            'id' => $_POST['id']
        ]);

        //redirect to vehicles page
        header('location: /vehicles');
        exit;
    }
}
