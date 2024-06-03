<?php
include('dv.php');

// Define columns
$columns = array(
    'id',
    'isbn',
    'hauteur',
    'editeur',
    'titre',
    'nbrpage',
    'adition',
    'nbrexmp',
    'datepubli'
);

// Get total number of records
$total_records = mysqli_num_rows(mysqli_query($conction, "SELECT * FROM livres"));

// Define SQL query
$sql = "SELECT * FROM livres";

// Apply search filter if keyword is provided
if (!empty($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE ";
    for ($i = 0; $i < count($columns); $i++) {
        $sql .= ($i > 0 ? " OR " : "") . "{$columns[$i]} LIKE '%$search_value%'";
    }
}

// Get total filtered records
$total_filtered_records = mysqli_num_rows(mysqli_query($conction, $sql));

// Apply sorting
if (isset($_POST['order'])) {
    $column_index = $_POST['order'][0]['column'];
    $column_name = $columns[$column_index];
    $sql .= " ORDER BY {$column_name} {$_POST['order'][0]['dir']}";
}

// Apply pagination
if (isset($_POST['start']) && $_POST['length'] != -1) {
    $start = intval($_POST['start']);
    $length = intval($_POST['length']);
    $sql .= " LIMIT $start, $length";
}

// Execute SQL query
$query = mysqli_query($conction, $sql);

// Prepare data array
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array_values($row); // Convert associative array to indexed array
}

// Prepare response
$response = array(
    'draw' => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
    'recordsTotal' => $total_records,
    'recordsFiltered' => $total_filtered_records,
    'data' => $data
);

// Output response as JSON
echo json_encode($response);
?>
