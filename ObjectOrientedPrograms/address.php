<?php
/**
 * Purpose: Design of simple Address Book.
 * @author Nishithkumar
 * @version 1.0
 * @since 30-01-2019
 ******************************************************************************/
include 'Outility.php';
class Person
{
    /**
     * declaring the variables
     */
    public $fname;
    public $lname;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phone;
}

/**
 * function to create the person object asked by the user.
 * @parameter indicates to store the object in the addressbook array
 */
function createPerson(&$addressBook)
{
    /**
     * creating the object.
     */
    $person = new Person();
    //asking user for input for person object
    echo "Enter Firstname \n";
    $person->fname = Outility::getString();
    echo "Enter Lastname \n";
    $person->lname = Outility::getString();
    echo "Enter State\n";
    $person->state = Outility::getString();
    echo "Enter City\n";
    $person->city = Outility::getString();
    echo "Enter Zip of $person->city\n";
    $person->zip = Outility::getInt();
    echo "Enter Address\n";
    $person->address = Outility::getString();
    echo "Enter Mobile Number \n";
    $person->phone = Outility::getInt();
    /**
     * storing the newly created object in to addressbook array
     */
    $addressBook[] = $person;
}

/**
 * function to edit the details of a person
 * @param the person object to edit the details
 */
function edit(&$person)
{
    echo "Enter 1 to change Address ";
    $choice = Outility::getInt();
    switch ($choice) {
        case '1':
            echo "Enter State\n";
            $person->state = Outility::getString();
            echo "Enter City\n";
            $person->city = Outility::getString();
            echo "Enter Zip \n";
            $person->zip = Outility::getInt();
            echo "Enter Address\n";
            $person->address = Outility::getString();
            echo "Address changes succesfully \n";
            echo "Enter Mobile Number \n";
            $person->phone = Outility::getInt();
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
    if ($i > -1) {
        array_splice($arr, $i, 1);
        echo "Entry Deleted\n";
    } else {
        echo "Entry Not Found\n";
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
    $fname = Outility::getString();
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]->fname == $fname) {
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
        echo sprintf("%s %s\n%s\n%s, %s\nZip - %u\nMobile- %u\n\n", $person->fname, $person->lname, $person->address, $person->city, $person->state, $person->zip, $person->phone);
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
    file_put_contents("AddressBook.json", json_encode($addressBook));
}
/**
 * function act as a default menu for the program
 */
function menu($addressBook)
{
    echo "\nEnter 1 to add person\nEnter 2 to Edit a person\nEnter 3 to Delete a person\nEnter 4 to Sort and Display\n\nEnter anything to exit\n";
    $ch = Outility::getInt();
    switch ($ch) {
        case '1':
            createPerson($addressBook);
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
            echo "Enter 1 to sort by NamenElse to Menu";
            $c = Outility::getInt();
            if ($c == 1) {
                sortBook($addressBook, "fname");
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
$arr = json_decode(file_get_contents("AddressBook.json"));
menu($arr);