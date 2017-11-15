<?php include "header.php"; ?>

    <h1>
        Sign Up Form
    </h1>
    <p>
        All * feilds are requiered. 
    </p>
<form action="createAccount.php" method="post">
Full Name: <input type="text" name="customerName" value="" />*<br>
User Name: <input type="text" name="customerUserName" value="" />*<br>
Email: <input type="text" name="emailAddress" value="" />*<br>
Address: <input type="text" name="address" value="" />*<br>
City: <input type="text" name="city" value="" />*<br>
State: <select name="states">
        <option value=""></option>
	<option value="AL">Alabama (AL)</option>
	<option value="AK">Alaska (AK)</option>
	<option value="AZ">Arizona (AZ)</option>
	<option value="AR">Arkansas (AR)</option>
	<option value="CA">California (CA)</option>
	<option value="CO">Colorado (CO)</option>
	<option value="CT">Connecticut (CT)</option>
	<option value="DE">Delaware (DE)</option>
	<option value="DC">District Of Columbia (DC)</option>
	<option value="FL">Florida (FL)</option>
	<option value="GA">Georgia (GA)</option>
	<option value="HI">Hawaii (HI)</option>
	<option value="ID">Idaho (ID)</option>
	<option value="IL">Illinois (IL)</option>
	<option value="IN">Indiana (IN)</option>
	<option value="IA">Iowa (IA)</option>
	<option value="KS">Kansas (KS)</option>
	<option value="KY">Kentucky (KY)</option>
	<option value="LA">Louisiana (LA)</option>
	<option value="ME">Maine (ME)</option>
	<option value="MD">Maryland (MD)</option>
	<option value="MA">Massachusetts (MA)</option>
	<option value="MI">Michigan (MI)</option>
	<option value="MN">Minnesota (MN)</option>
	<option value="MS">Mississippi (MS)</option>
	<option value="MO">Missouri (MO)</option>
	<option value="MT">Montana (MT)</option>
	<option value="NE">Nebraska (NE)</option>
	<option value="NV">Nevada (NV)</option>
	<option value="NH">New Hampshire (NH)</option>
	<option value="NJ">New Jersey (NJ)</option>
	<option value="NM">New Mexico (NM)</option>
	<option value="NY">New York (NY)</option>
	<option value="NC">North Carolina (NC)</option>
	<option value="ND">North Dakota (ND)</option>
	<option value="OH">Ohio (OH)</option>
	<option value="OK">Oklahoma (OK)</option>
	<option value="OR">Oregon (OR)</option>
	<option value="PA">Pennsylvania (PA)</option>
	<option value="RI">Rhode Island (RI)</option>
	<option value="SC">South Carolina (SC)</option>
	<option value="SD">South Dakota (SD)</option>
	<option value="TN">Tennessee (TN)</option>
	<option value="TX">Texas (TX)</option>
	<option value="UT">Utah (UT)</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>*<br>	
Zip: <input type="text" name="zip" value="" />*<br>
Gender: <input type="RADIO" name="gender" value="male" > Male
<input type="RADIO" name="gender" value="female"> Female
<input type="RADIO" name="gender" value="notSure"checked> Not-Sure<br>
Password: <input type="password" name="password" value="" />*<br>
Re - Password: <input type="password" name="passwordConf" value="" />*<br>
Send Email Newsletter: <input type="checkbox" name="sendNews" checked /><br>


Occupation: <br><select name="occupations" size=5 multiple>
<option value="Finance" SELECTED>Finance
<option value="Marketing">Marketing
<option value="Sales">Sales
<ottion value="Software">Software
<option value="Hardware">Hardware
<option value="Food">Food
<option value="Engineer">Engineer
</select><br>

Tell Us About Yourself:<br><textarea name="about" rows="10" cols="60" wrap="virtual">
Type Here
</textarea><br>

<input type="submit" name="submit_button" value="Press to Submit" />
</form>
    
<?php include "footer.php"; ?>