<div id="section-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<section id="email">
    <div class="container-fluid" id="email_section_container">
        <div class="row">
            <div class="col-12 section-header"><p>Add Email:</p></div>
            <div class="col-12"><small>Note: email's must end in: name@richcopropertysolutions.com</small></div>
            <div class="col-12">
                <table id="email_add" class="mt-2">
                    <thead>
                        <tr>
                            <th>
                                New Email
                            </th>
                            <th>
                                Password
                            </th>
                        </tr>
                    </thead>
                    <tbody contenteditable="true">
                        <tr>
                            <td>
                                <input id="email_new" type="text" class="text-white"/>
                            </td>
                            <td>
                                <input  id="password_new" class="password_new" type="password"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-2 text-justify">
                <button class="btn btn-outline-green btn-lg" id="add_email">Add</button>
            </div>
            <div class="col-12 mt-2" id="email_add_result">
            </div>
            <div class="col-12 mt-5 section-header"><p>Current Email addresses:</p></div>
            <div class="col-12"><small>You can change/reset passwords below:</small></div>
            <div class="col-12 mt-2">
                <table id="email_current" class="mt-2">
                    <thead  contenteditable="false">
                        <tr>
                            <th>
                                Email
                            </th>
                            <th>
                                Password (hidden)
                            </th>
                            <th>
                                Remove
                            </th>
                        </tr>
                    </thead>
                    <tbody contenteditable="true" id="all_emails">
                        
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-2 text-justify">
                <button class="btn btn-outline-green btn-lg" id="update_email">Update</button>
            </div>
            
            <div class="col-12 mt-2" id="email_update_result">
            </div>
        </div>
    </div>
</section>
