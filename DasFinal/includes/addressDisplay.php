<h4>Your Address Book</h4><br>
<?php
//form gets $selectedAddressGroupId, $searchIndex and $searchField from user
//$sortby is set on userdefault page to 'fullname' as a default value
    $addressGroups = getAddressGroups();
    $sortBy = 'fullname';
    $displayAddressInfo = getAddresses($currentUserID, $sortBy);
include '/includes/actionsForm.php';
?>

       
<?php   
        if (isset($selectedGroup))
        {
            $displayAddressInfo = groupSort($currentUserID, $selectedGroup, $sortBy);
        }
        if ((isset($searchIndex)))
        {
            $displayAddressInfo = searchDatabase($currentUserID, $searchIndex, $searchField) ;
        }
        if ((isset($sortIndex)))
        {
            $displayAddressInfo = getAddresses($currentUserID, $sortIndex) ;
        }
        
        
        if ( isset($displayAddressInfo) && count($displayAddressInfo) > 0 ) : ?>

<div class="row">
        <table class="table">
            <td><b>Name</b></td>
            <td><b>Address</b></td>
            <td> </td>
            <?php foreach ($displayAddressInfo as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <form method="post" action="?view=userdefault&user_view=read&view_address_id=<?php echo $row['address_id']?>">
                            <input type="submit" value="View Detail" class="btn btn-default" />
                        </form>
                    </td>
                </tr>    
            <?php endforeach; ?>
        </table>
    </div>


 <?php else: ?>       
        <h2>No Addresses Found</h2>        
<?php endif; ?>

