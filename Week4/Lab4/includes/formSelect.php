<form action="#" method="post">
    <fieldset>
        <legend>Sort Order</legend>
        <input type="radio" name ="Ascending"checked value = "ascending">Ascending
        <input type="radio"name ="Descending" value = "descending"> Descending<br>
    
        <label>Select Sort By</label>
        <select name="Select">
            <option value="corp">Company Name</option>
            
            <option value="email">Email</option>
            
            <option value="zip">Zipcode</option>
            
            <option value="owner">Owner Name</option>
            
            <option value="phone">Phone Number</option>
            
        </select>
        
        <input type="hidden" name="action" value="Submit1"/>
        <input type="submit" value="Submit1" />
        
    </fieldset>
</form>
