





<html>
    <head><title>add</title>
</head>
<body>
  
    <form action="/api/createcustomer" method="post">
    <!-- @csrf -->
<input type="text" placeholder="Customer Name" name="name" id="name" autocomplete="off" class="ac_input">
<select name="server">
                                            <option >Select</option>
                                            <option value="sim">SIM</option>
                                            <option value="smart">SMART</option>
                                            <option value="gps">GPS</option>
</select>
<input type="text" placeholder="Account" name="account">
<input type="text" placeholder="Phone" name="phone">
<input type="text" placeholder="username" name="username">
<input type="text" placeholder="password" name="password">
<input type="number" placeholder="No of connection" name="noofconn">
<input type="text" placeholder="devicetype" name="type">
<input type="text" placeholder="network" name="network">
<textarea name="remark" class="contact-message" cols="30" rows="10" placeholder="Remark"></textarea>
<input type="text" placeholder="Total" id="total" name="total">
<input type="text" placeholder="Address" name="address">
<input type="text" placeholder="Rental" id="rental" name="rental" onkeyup="multiply()">
<a href="create"><input type="submit" name="submit" value="Add"></a> 
</form>
</body>
</html>