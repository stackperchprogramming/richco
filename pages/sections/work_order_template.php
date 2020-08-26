<div id="section-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<style>
    
.logo{
    
}
section#work_template {
    width:100%;
}
section#work_template p, section#work_template span{
    font-size: 12px;
    line-height: 18px!important;
    margin-bottom: 2px!important;
}
section#work_template .section-header{
    font-size: 24px!important;
    line-height: 24px!important;
}
.order_heading{
    color: #006505;
    font-weight: 600;
    font-size: 14px!important;
}
#work_order_details th:focus, #work_order_details td:focus{
    border-color: white!important;
}
#work_order_details th, #work_order_details td, #todo tr{
    border-width: 1.5px;
}
#work_order_details tr, #todo tr, #todo tr:nth-of-type(even) td, #todo tr:nth-of-type(odd) td{
    background-color: rgba(40, 167, 69,.3)!important;
    border-width: 1.5px !important;
    border-top-width: 5px !important;
    border-top-color: white !important;/* workaround - no margins on table rows */
}
.num{
    width:5%;
}
.desc{
    width:85%;
}
.stat{
    width:10%;
}
tr:focus{
    border-color: white!important;
}
#todo tr{
    margin-top:5%;
}
#work_order_details th{
    text-align: center;
    color:black;
}
#add_todo:hover{
    cursor:pointer;
}
</style>
<section id="work_template">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-6 mt-2">
                <img class="ml-auto img-fluid logo" src='../wp-content/themes/richco/images/logo_wide.png' />
            </div>
            <div class="col-6 pull-right mt-auto">
                <h2 id="work_id" class="bold mb-2"></h2>
                <p class="order_heading">Creation Date: <span class="date"></span> 
            </div>
        </div>
        <div class="row ml-5 mb-5">
            <div class="col-1"><p class="order_heading">Client:</p></div>
            <div class="col-11">
                    <p id="business"></p>
                    <p id="name"></p>
                    <p id="address"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table id='work_order_details'>
                    <thead>
                    <th>
                        Description
                    </th>
                    <th>
                        Comments
                    </th>
                    <th>
                        Status
                    </th>
                    </thead>
                    <tbody>
                    <td id='details' contenteditable="true">
                        
                    </td>
                    <td id="comments" contenteditable="true">
                        
                    </td>
                    <td id="status" contenteditable="true">
                        
                    </td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pull-right noprint mt-5"><p class="order_heading" id='add_todo'><i class="fa fa-plus"></i>  Add To-Do List</p></div>
            </div>
            <div class="col-12 mt-2">
                <table id="todo">
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="order_heading">Photos:</h4>
            </div>
            <div class="col-12 mt-2">
                <div class="row work_order_row" id="work_order_photos">
                    <div class="col-3 upload_photo upload-area-work">
                        <p class="text-center"><i class="fa fa-upload mt-5"></i> <br />Additional <br /> Photos</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="order_heading">Documents:</h4>
            </div>
            <div class="col-12 mt-2">
                <div class="row work_order_row" id="work_order_documents">
                    <div class="col-3 upload_doc upload-area-work">
                        <p class="text-center"><i class="fa fa-upload mt-5"></i> <br />Additional <br /> Docs</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <button class="btn btn-outline-green btn-lg" id="work_order_save">Save</button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div id="save_work_order_details_result"></div>
            </div>
        </div>
    </div>
    <input type="file" class="file_upload hidden" name="file" id="work_order_file"/>
</section>