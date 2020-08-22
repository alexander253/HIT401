<h1>Add a Bin</h1>
<div>
<form action='/addbin' method='POST'>
 <input type='hidden' name='_method' value='post' />


 <label for='type'>Type</label>
 <input type='text' id='type' name='type' />

 <label for='loc'>Location</label>
 <input type='text' id='loc' name='loc' />

 <label for='use'>Usage</label>
 <input type='text' id='use' name='use' />

<!--
<label for="cate">Category:</label>
<select name="cate" id="cate">
  <option value="Common">Common</option>
  <option value="Rare">Rare</option>
  <option value="Ulra Rare">Ultra Rare</option>
</select> <br>

<label for="size">Size:</label>
<select name="size" id="size">
  <option value="Small">Small</option>
  <option value="Medium">Medium</option>
  <option value="Large">Large</option>
  <option value="Extra Large">Extra Large</option>
</select>
-->

 <input type='submit' value='Add bin' />
</form>
</div>
