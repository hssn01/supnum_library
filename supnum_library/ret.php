<?
            if(isset($_POST['return_button'])){
            include_once "dv.php";
            
            // Get the current date
            $current_date = date('Y-m-d');
            $id_emprent = $_POST['id_emprent'];
            // Update the date_retour_reel column with the current date
            $req = mysqli_query($conction, "UPDATE emprent SET date_retour_reel = '$current_date' WHERE id_emprent = $id_emprent");
        
            // Check if the update was successful
            if ($req) {
                // Redirect to the emprent list page
                header("Location: emprent.php");
                exit;
            } else {
                $message = "Failed to update date_retour_reel";
            }
        }else if(isset($_POST['cancel_return_button'])){
            include_once "dv.php";
            
            $id_emprent = $_POST['id_emprent'];
            // Update the date_retour_reel column with the current date
            $req = mysqli_query($conction, "UPDATE emprent SET date_retour_reel = NULL WHERE id_emprent = $id_emprent");
        
            // Check if the update was successful
            if ($req) {
                // Redirect to the emprent list page
                header("Location: emprent.php");
                exit;
            } else {
                $message = "Failed to update date_retour_reel";
            }
        }
        
        
        ?>