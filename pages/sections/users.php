<div id="section-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<section id="user">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 section-header"><p>Add Portal User:</p></div>
            <div class="col-12"><small>Note: Available account types are client, vendor, or admin</small></div>
            <div class="col-12">
                <table id="users" class="mt-2">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Company
                            </th>
                            <th>
                                Account type
                            </th>
                            <th>
                                Password
                            </th>
                        </tr>
                    </thead>
                    <tbody contenteditable="true">
                        <tr>
                            <td id="user_name">
                                
                            </td>
                            <td id="user_email">
                                
                            </td>
                            <td id="user_address">
                                
                            </td>
                            <td id="user_phone">
                                
                            </td>
                            <td id="user_company">
                                
                            </td>
                            <td id="user_type">
                                
                            </td>
                            <td>
                                <input  id="user_password" class="user_password" type="password"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-2 text-justify">
                <button class="btn btn-outline-green btn-lg" id="add_user">Add</button>
            </div>
            <div class="col-12 mt-2" id="add_user_result">
            </div>
            <div class="col-12 mt-5 section-header"><p>Current Users:</p></div>
            <div class="col-12"><small>You can change details below.<br/>Passwords are hidden for security reason but you can still change a password below.</small></div>
            <div class="col-12 mt-2">
                <table id="user_current" class="mt-2">
                    <thead contenteditable="false">
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Company
                            </th>
                            <th>
                                Account type
                            </th>
                            <th>
                                Password
                            </th>
                            <th>
                                Remove
                            </th>
                        </tr>
                    </thead>
                    <tbody contenteditable="true" id="all_users">
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                Email
                            </td>
                            <td>
                                Address
                            </td>
                            <td>
                                Phone
                            </td>
                            <td>
                                Company
                            </td>
                            <td>
                                Account type
                            </td>
                            <td>
                                Password
                            </td>
                            <td class="remove text-center">
                                <button class="btn btn-outline-green btn-sm remove_user">Remove</button>
                            </td>
                        </tr>
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
