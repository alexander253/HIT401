<h1>Add a Rubbish Item</h1>
<div>
<form action='/addrubbish_item' method='POST'>
 <input type='hidden' name='_method' value='post' />


 <label for='type'>Type</label>
 <input type='text' id='type' name='type' />

 <label for='desc'>Description</label>
 <input type='text' id='desc' name='desc' />


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

 <input type='submit' value='Add rubbish item' />
</form>
</div>
