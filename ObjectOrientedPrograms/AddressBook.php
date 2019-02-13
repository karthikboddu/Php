<?php
/**
 * Purpose  : Design of simple Address Book.
 * @file    : AddressBook.php
 * @author  : karthik
 * @version : 1.0
 * @since   : 08-01-2019
 ******************************************************************************/
include 'utility.php';
require 'AddressDetails.php';

set_error_handler(function($e){
    echo "ERROR !!--";
    echo $e->getMessage();
}
);
class Person extends Contact
{
    /**
     * declaring the variables
     */
}

/**
 * function to create the person object asked by the user.
 * @param : indicates to store the object in the addressbook array
 */
function createContact(&$addressBook)
{
    /**
     * creating the object.
     */

    //taking user for input for person object
    $person = new Contact();
    echo "Enter Firstname \n";
    $fname = Oops::readString();
    $person->setFName($fname);
    echo "Enter Lastname \n";
    $lname = Oops::readString();
    $person->setLName($lname);
    echo "Enter State\n";
    $state = Oops::readString();
    $person->setState($state);
    echo "Enter City\n";
    $city = Oops::readString();
    $person->setCity($city);
    echo "Enter Zip of $city\n";
    $zip = Oops::readInt();
    $person->setZip($zip);
    echo "Enter Address\n";
    $address = Oops::readString();
    $person->setAddress($address);
    echo "Enter Mobile Number \n";
    $phone = Oops::readInt();
    $person->setPhone($phone);
    /**
     * storing the newly created object in to addressbook array
     */
    $person = new Contact($fname, $lname, $state, $city, $zip, $address, $phone);

    $addressBook[] = $person;
}

/**
 * function to edit the details of a person
 * @param : person object to edit the details
 */
function edit(&$person)
{
    echo "Enter 1 to change Address ";
    $choice = Oops::readInt();

    //updating the address book by taking user input
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

    //searching contact name and deleting the contact
    try {
        if ($i > -1) {
            array_splice($arr, $i, 1);
            echo "Contact Deleted\n";
        } else {
            throw new Exception("Contact not found\n");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    fscanf(STDIN, "%s\n");
}

/**
 * function developed to indicate to search the index based given by the user
 * @param : arr the array containig person from which to search
 * @return : index of the searched item or -1 it indicates  search element is not found
 */
function search($arr)
{
    //taking user input to search the contact
    echo "Enter firstaname to search\n";
    $fName = Oops::readString();
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]->fName == $fName) {
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
    try{
        if($arr == null){
            throw new Exception("Book is empty\n");
        }
        else{
            foreach ($arr as $person) {
                $i = 1;
                echo sprintf(" \tName : %s %s\n\tCity : %s\n\tAddress : %s\n\tstate : %s\n\tZip - %u\n\tMobile- %u\n\n", $person->fName, $person->lName, $person->address, $person->city, $person->state, $person->zip, $person->phone);
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

/**
 * function to sort the array by person object property
 * @param : arr the array containig person object to sort
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
 * @param : an array to what to save in the json file
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
    echo "\nEnter\t1 to add contact\n\t2 Edit Contact\n\t3 Delete Contact\n\t4 sort\n\t5 Display\n";
    $ch = Oops::readInt();
    switch ($ch) {
        case '1':
            createContact($addressBook);
            save($addressBook);
            menu($addressBook);
            break;
        case '2':
            printBook($addressBook);
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
            printBook($addressBook);
            delete($addressBook);
            save($addressBook);
            menu($addressBook);
            break;
        case '4':

            $c = 1;
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
        case 5 :printBook($addressBook);
                break;    
    }

}
$arr = json_decode(file_get_contents("addressBook.json"));
menu($arr);
