                <div class="form-group">
                    <label for="rname">Recipe Name</label>
                    <input type="text" name="rname" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="comments">Description</label>
                    <input type="text" name="comments" class= "form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="history">Source</label>
                    <input type="text" name="history" class="form-control form-control -lg">
                  </div>

                  <div class="form-group">
                  <label for="course">Course</label>
                  <select id="course" name="course">
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="sides">Side Dish</option>
                    <option value="dinner">Dinner</option>
                    <option value="dessert">Dessert</option>
                    <option value="snacks">Snacks</option>
                    <option value="salad">Salad</option>
                </select>
                  </div>

                  <div class="form-group">
                  <label for="basetype">Base Type</label>
                  <select id="basetype" name="basetype">
                    <option value="rpn">Rice/Pasta/Noodles</option>
                    <option value="milk">Milk/Cheese</option>
                    <option value="egg">Egg</option>
                    <option value="poultry">Poultry</option>
                    <option value="meat">Meat</option>
                    <option value="fish">Fish</option>
                    <option value="fruit">Fruit/Vegetable</option>
                    <option value="other">Other</option>
                </select>
                  </div>

                  <div class="form-group">
                    <label for="prepm">Preparation Method</label>
                    <select id="prepm" name="prepm">
                    <option value="stove">Stove</option>
                    <option value="indstove">Induction Stove</option>
                    <option value="microwave">Microwave</option>
                    <option value="oven">Oven</option>
                    <option value="bbq">BBQ</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="ethnicity">Ethnicity</label>
                    <select id="ethnicity" name="ethnicity">
                    <option value="indian">Indian</option>
                    <option value="chinese">Chinese</option>
                    <option value="mexican">Mexican</option>
                    <option value="american">American</option>
                    <option value="italian">Italian</option>
                    <option value="middleeast">Middle Eastern</option>
                    <option value="french">French</option>
                    <option value="japanese">Japanese</option>
                </select>
                  </div>

                  <div class="form-group">
                    <label for="prept">Preparation Time (In minutes)</label>
                    <input type="text" name="prept" class="form-control form-control -lg">
                  </div>

                  <div class="form-group">
                    <label for="diff">Difficulty</label>
                    <select id="diff" name="diff">
                    <option value="easy">Easy</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="adv">Advanced</option>
                    <option value="expert">Expert</option>
                </select>
                  </div>

                  <div class="form-group">
                    <label for="serving">Serving Size</label>
                    <input type="int" name="serving" class="form-control form-control -lg">
                  </div>
                
                <div class="form-group">
                <table id="ingre">
                <thead>
                <tr>
                <th>Quantity</th>
                <th>Units</th>
                <th>Ingredient</th>
                <th>Alternate Ingredient</th>
                </tr>
                </thead> 
                <tbody>
                </tbody>
                <tfoot>
                        <tr>
                        <td><input type="button" value="Add Ingredient" id="newrows" </td>
                </tfoot>
                </table>
                
                <br>
                <input type="file" name="image" id="image" />
                <br />
                <p> </p>
                <input type='submit' name='insert' id='insert' value='insert' />
                
                <table class ="table table-bordered">
                    <tr>
                        <th>image</th>
                    </tr>
                    <?php 
                    $query = "SELECT * FROM images ORDER BY img_id DESC";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result))  
                    {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['i_name'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                    }  
                ?>  
                </table>  
                
                  <div class="form-group">
                    <label for="directions">Directions</label>
                    <textarea class="form-control form-control -lg" type="text" name="directions" placeholder="Write something.." style="height:200px"></textarea>
                  </div>
                  

                  <div class="form-group">
                    <button type="SUBMIT" name="recipe_submit" class="btn btn-primary btn-block btn-lg">SUBMIT</button>
                  </div>