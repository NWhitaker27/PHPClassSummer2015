<form method="GET" action="#">
    <h3>OR</h3>
    <select name="searchby">
        <option value="corp">Corp</option>
        <option value="owner">Owner</option>
        <option value="zipcode">Zip code</option>
    </select>
    <input type="radio" name="order" value="ASC">ASC
    <input type="radio" name="order" value="DESC">DESC
    <input type="hidden" name="search" value="selectData"/>
    <input type="submit" value="Search"/>
</form>