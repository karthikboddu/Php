<?php
/**
 * Purpose: Design of simple Address Book.
 * @author karthik
 * @version 1.0
 * @since 30-01-2019
 ******************************************************************************/
include 'utility.php';
require 'AddressDetails.php';
class Person extends Contact
{
    /**
     * declaring the variables
     */
}

/**
 * function to create the person object asked by the user.
 * @parameter indicates to store the object in the addressbook array
 */
function createContact(&$addressBook)
{
    /**
     * creating the object.
     */
  
    //asking user for input for person object
    echo "Enter Firstname \n";
    $fname = Oops::readString();
    echo "Enter Lastname \n";
    $lname = Oops::readString();
    echo "Enter State\n";
    $state = Oops::readString();
    echo "Enter City\n";
    $city = Oops::readString();
    echo "Enter Zip of $city\n";
    $zip = Oops::readInt();
    echo "Enter Address\n";
    $address = Oops::readString();
    echo "Enter Mobile Number \n";
    $phone = Oops::readInt();
    /**
     * storing the newly created object in to addressbook array
     */
    $person = new Contact($fname,$lname,$state,$city,$zip,$address,$phone);
    
    $addressBook[] = $person;
    print_r($addressBook);
}

/**
 * function to edit the details of a person
 * @param the person object to edit the details
 */
function edit(&$person)
{
    echo "Enter 1 to change Address ";
    $choice = Oops::readInt();
    switch ($choice) {
        case '1':
            echo "Enter State\n";
            $person->state = Oops::readString();
            echo "Enter City\n";
            $person->city = Oops::readString();
            echo "Enter Zip \n";
            $person->zip = Oops::readInt();
            echo "Enter Address\n";
            $person->address = Oops::readString();
            echo "Address changes succesfully \n";
            echo "Enter Mobile Number \n";
            $person->phone = Oops::readInt();
            echo "Moble no changed succesfully\n";
            break;
    }
}

/**
 * Function to delete the object of person from the array
 */
function delete(&$arr)
{
    $i = search($arr);
    try{
        if ($i > -1) {
            array_splice($arr, $i, 1);
            echo "Contact Deleted\n";
        } else {
            throw new Exception ("Contact not found\n");
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
    fscanf(STDIN, "%s\n");
}

/**
 * function developed to indicate to search the index based given by the user
 * @param arr the array containig person from which to search
 * @return index of the searched item or -1 it indicates  search element is not found
 */
function search($arr)
{
    echo "Enter firstaname to search\n";
    $fName = Oops::readString();
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]->fName == $fname) {
            return $i;
        }
    }
    return -1;
}

/**
 * function to print the addressbokk as a mailing format
 */
function printBook($arr)
{
    foreach ($arr as $person) {
        $i = 1;
        echo sprintf($i.": Name : %s %s\n  City : %s\n  Address : %s\n  state : %s\n  Zip - %u\n  Mobile- %u\n\n", $person->fName, $person->lName, $person->address, $person->city, $person->state, $person->zip, $person->phone);
    }
}

/**
 * function to sort the array by person object property
 *
 * @param arr the array containig person object to sort
 * @param  prop the property for which to sort
 */
function sortBook(&$arr, $val)
{
    for ($i = 1; $i < count($arr); $i++) {
        // getting value for back element
        $j = ($i - 1);
        //saving it in temperary variable;
        $temp = $arr[$i];
        while ($j >= 0 && $arr[$j]->{$val} >= $temp->{$val}) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $temp;

    }
}

/**
 * function to save the address book
 *
 * the parameter indicates an array to what to save in the json file
 */
function save($addressBook)
{
    file_put_contents("addressBook.json", json_encode($addressBook));
    echo "contact saved successfully\n";
}
/**
 * function act as a default menu for the program
 */
function menu($addressBook) 
{
    echo "\nEnter 1 to add contact\n 2 Edit Contact\n3 Delete Contact\n 4 Sort and Display\n\nEnter anything to exit\n";
    $ch = Oops::readInt();
    switch ($ch) {
        case '1':
            createContact($addressBook);
            save($addressBook);
            menu($addressBook);
            break;
        case '2':
            $k = 2;
            while (($i = search($addressBook)) === -1) {
                var_dump($i);
                echo "No enteries Found\nenter 1 to exit to MENU or Else to search again\n";
                fscanf(STDIN, "%s\n", $k);
                if ($k == 1) {
                    break;
                }
            }
            if ($k == 1) {
                menu($addressBook);
            } else {
                $addressbook[$i] = edit($addressBook[$i]);
                save($addressBook);

            }
            menu($addressBook);
            break;
        case '3':
            delete($addressBook);
            save($addressBook);
            menu($addressBook);
            break;
        case '4':
            echo "Enter 1 to sort by Name Else to Menu";
            $c = Oops::readInt();
            if ($c == 1) {
                sortBook($addressBook, "fName");
                save($addressBook);
                printBook($addressBook);
            } else {
                menu($addressBook);
            }
            fscanf(STDIN, "%s\n");
            menu($addressBook);
            break;
    }

}
$arr = json_decode(file_get_contents("addressBook.json"));
menu($arr);