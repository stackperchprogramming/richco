<div id="section-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<section id="documents">
    <div class=" du_documentupload">
  <div class="modal__content" uib-modal-transclude="">
    <div class="modal__header modal_participation ng-scope">
      <h2 class="modal__title ng-binding">
        <i class="ico-sm icon-hdd-up"></i>DOCUMENT UPLOAD
    </h2>
      <button class="modal__help" ng-click="toggleHelp()">
        <i class="ico-xs icon-bubbles"></i>
        <span class="menuHover ng-binding"></span>
    </button>
      <button class="modal__close" ng-click="closeModal()" data-dismiss="modal" aria-label="Close">
        <i class="ico-xs icon-cross2"></i>
    </button>
    </div>
    <div class="modal__body ">
      <div class="col-12 col-sm-12 col-md-12 boxContent ">
        <div class="row">


        </div>


        <div class="row">
            <div class="mx-auto">
                <h4 class="ng-binding text-center mb-2">
                    Share Files
                </h4>
                <p class="text-center ng-binding mb-2">
                    Have a large work order or other files? Upload them here...
                </p>
                <div class="row  du-properties mb-2">
                    <div class="col-12 text-center du-box  ">
                        <i class="ico-md icon-cloud-upload"></i>
                        <div class="du-dropfiles">
                            <h4 class="mb-2">   
                            Drop files here to upload <br /> or 
                          </h4>
                            <input type="button" id="du-button-files" value="Browse" class="du-dropfiles-link">
                            <input type="file" name="open-file" id="open-file">
                        </div>
                <div class="du-accepted">
                  Accepted files types: xls, docx, doc, pdf... <br /> Max size 10Mb
                </div>
              </div>

              <div class="du-bar-wrap">
                <div class="du-bar-progress">
                </div>
              </div>
              <div class="du-footer">
                <div class="du-documents">
                    <div class="row">
                        <div class="du-doc">
                            <div class="du-doc-img">
                                <a href="#">
                                    <i class="ico-md icon-file-image fa fa-file-word"></i>
                                    <span> pdf </span>
                                </a>
                            </div>
                            <div class="du-doc-options">
                                <a href="#">
                                    <i class="ico-xxs icon-trash2 fa fa-trash-alt"></i>
                                </a>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="du-buttons">
                  <a class="btn gray anim250 ng-binding ng-scope">cancel</a>
                  <a class="btn greenBtn anim250 ng-binding ng-scope">VALIDATE</a>


                </div>
              </div>

            </div>

          </div>

        </div>


      </div>
    </div>

  </div>
</div>
</section>