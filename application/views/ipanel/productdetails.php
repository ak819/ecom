             <div class="row">
              
                <div class="col-md-8 "> 
            <table class="pull-left table">
                         <tbody>
                             <tr>
                                 <td class="h6"><strong>Product Name</strong></td>
                                 <td>:</td>
                                 <td class="h5"><?= $productdetails->p_name;?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Category</strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->cat_name;?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Condition</strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->p_condition;?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Description</strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->p_description;?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Specification</strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->p_specification;?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Stock</strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->p_stock;?></td>
                             </tr>  

                             <tr>
                                 <td class="h6"><strong> MRP </strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->p_mrp;?></td>
                             </tr>                            

                             <tr>
                                 <td class="h6"><strong>Product Selling price</strong></td>
                                 <td>:</td>
                                   <td class="h5"><?= $productdetails->p_price;?></td>
                             </tr>

                             <tr>
                                 <td class="h6"><strong>Product Status</strong></td>
                                 <td>:</td>
                                   <td class="h5"> <?= strtoupper( $productdetails->p_status);?></td>
                             </tr>

                            
                             <tr>
                                <!--  <td class="btn-mais-info text-primary">
                                    <i class="open_info fa fa-plus-square-o"></i>
                                    <i class="open_info hide fa fa-minus-square-o"></i> Information
                                </td>
                                <td> </td>
                                <td class="h5"></td> -->
                             </tr> 

                         </tbody>
                    </table>
                      </div>       
                         
                    <div class="col-md-4"> 
                        <img src="<?= base_url();?>assets/ipanel/uploads/product_img/<?= $productdetails->p_image?>" alt="teste" class="img-thumbnail">  
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="h6" >Uploaded By company</th>
                                    <td>:</td>
                                    <th><?= $productdetails->comp_name; ?></th>
                                </tr>
                                <tr>
                                    <th class="h6" >Contact Persons</th>
                                    <td>:</td>
                                    <th><?= $productdetails->contactper; ?></th>
                                </tr>
                                <tr>
                                    <th class="h6" >Mobile</th>
                                    <td>:</td>
                                    <th><?= $productdetails->mobile; ?></th>
                                </tr>
                                <tr>
                                    <th class="h6" >Email</th>
                                    <td>:</td>
                                    <th><?= $productdetails->email; ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="clearfix"></div>
                   <p class="open_info hide">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
               </div>