<div class="form-group">
    <center>
<form action="#" method="get">
    <fieldset>
        <legend><u>Search Data</u></legend>
        
        
        <label>Search By</label> </br> 
        <select name="searchColumn">
            <?php 
                //populates selection with preset array of items and grabs user input for use in repopulating fields
                $columnHeaders = fillColumnArray();
                $columnSelection = filter_input(INPUT_GET, 'searchColumn');
                $searchSelection = filter_input(INPUT_GET, 'searchBy');
                for ($i=0; $i < 7; $i++){ ?>
            <option value="<?php echo $columnHeaders[0][$i];?>"<?php if ($columnSelection == $columnHeaders[0][$i]) 
                {
                    echo "selected";
                }
                ?>><?php echo $columnHeaders[1][$i];?></option>
            <?php } ?>  
        </select></br></br>
       
        
        <input name="searchBy" type="search" placeholder="Search...." value = "<?php           
        if (isGetRequest()) 
            {
            echo $searchSelection;
            }
            ?>"/></br>
    
        <input type="hidden" name="action" value="search" /></br>
        <input type="submit" class="btn btn-sm btn-primary" value="Submit" />
        <a class="btn btn-sm btn-primary" href="index.php?id=<?php echo $row['id']; ?>">Reset</a>
    </fieldset>            
</form>
        <center>
</div>