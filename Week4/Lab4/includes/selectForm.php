<div class="form-group">
    <center>
<form action="#" method="get">
    <fieldset>
        <legend><u>Sort Data</u></legend>
        
        <label>Sort Order</label><br>
        Ascending<input type="radio" name="sortOrder" value="ASC" />
        Descending<input type="radio" name="sortOrder" value="DESC" />

        <br><br>
        <label>Sort By</label> </br> 
        <select name="sortBy">
            <?php
                $columnHeaders = fillColumnArray();
                $sortSelection = filter_input(INPUT_GET, 'sortBy');
                for ($i=0; $i < 7; $i++){ ?>
            <option value="<?php echo $columnHeaders[0][$i];?>"<?php if ($sortSelection == $columnHeaders[0][$i]) 
                {
                    echo "selected";
                }
                ?>><?php echo $columnHeaders[1][$i];?></option>
            <?php } ?>            
        </select>
        <input type="hidden" name="action" value="sort" /></br>
        <input type="submit" class="btn btn-sm btn-primary"  value="Submit" />
        <a class="btn btn-sm btn-primary" href="index.php?id=<?php echo $row['id']; ?>">Reset</a>
    </fieldset>    
</form>
    </center>
</div>