<div id="section-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<section id="documents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 section-header"><p>Add Work Order:</p></div>
            <div class="col-12"><small>Note: <br />Work order ID's can be any numerical or alphabetic string that is unique.<br/>
                Comments and details may be added here or later by editing your work order after creating it.</small></div>
            <div class="col-12">
                <table id="documents_table" class="mt-2">
                    <thead>
                        <tr>
                            <th>
                                Work order ID
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Comments
                            </th>
                            <th>
                                Documents
                            </th>
                            <th>
                                Photos
                            </th>
                        </tr>
                    </thead>
                    <tbody contenteditable="true" id='work_new'>
                        <tr>
                            <td id='work_id' tabindex="0">
                                
                            </td>
                            <td id='work_details' tabindex="1">
                                
                            </td>
                            <td id='work_comments' tabindex="2">
                                
                            </td>
                            <td  class="upload-area"  id="uploadfile" contenteditable="false" tabindex="3">
                                <p class="my-auto mx-auto" id='upload_file_text'>Docs</p>
                            </td>
                            <td id='work_photos' contenteditable="false" tabindex="4">
                                <img src='../wp-content/themes/richco/images/placeholder.png' id='work_upload_photo' class="img-thumbnail img-placeholder img-tbl mx-auto"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <input type="file" class="file_upload hidden" name="file" id="file"/>
            <div class="col-12 mt-2 text-justify">
                <button class="btn btn-outline-green btn-lg" id="add_work" tabindex="4">Add</button>
            </div>

            <div class="col-12 mt-2" id="add_work_result"></div>
            
            <div class="col-12 mt-5  section-header"><p>Work Orders:</p></div>
            <div class="col-12"><small>You can view details below:</small></div>
            <div class="col-12 mt-2">
                <table id="work_current" class="mt-2">
                    <thead contenteditable="false">
                        <tr>
                            <th>
                                Work order ID
                            </th>
                            <th>
                                Comments
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Open Work Order
                            </th>
                            <th>
                                Remove Work Order
                            </th>
                        </tr>
                    </thead>
                    <tbody contenteditable="true" id="all_work_orders">
                        
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-2 text-justify">
                <button class="btn btn-outline-green btn-lg" id="update_user">Update</button>
            </div>
            
            <div class="col-12 mt-2" id="user_update_result">
            </div>
        </div>
    </div>
</section>