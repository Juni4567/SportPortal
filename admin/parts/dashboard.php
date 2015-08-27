<section class="forms-advanced">
            <div class="page-header">
              <h1><i class="md md-input"></i> SP dashboard</h1>
              <p class="lead">Sport portal admin dashboard is for updating scores notifying users and scheduling matches</p>
            </div>
            <div class="row m-b-40" id="datepickers">
              <div class="col-md-3 col-md-push-9">
                <h5>Datepickers</h5>
                <p>The <a target="_blank" href="http://eonasdan.github.io/bootstrap-datetimepicker/">bootstrap datepickers</a> are easy to use and configure.</p>
              </div>
              <div class="col-md-8 col-md-pull-3">
                <div class="well white">
                  <form class="form-floating placeholder-form">
                    <fieldset>
                      <legend>Date pickers</legend>
                      <div class="form-group">
                        <label class="control-label">Date</label>
                        <input type="text" class="form-control datepicker"> </div>
                      <div class="form-group">
                        <label class="control-label">Time</label>
                        <input type="text" class="form-control timepicker"> </div>
                      <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="md md-event-available"></i></span>
                          <div class="row">
                            <div class="col-md-5">
                              <input type="text" class="form-control datepicker"> </div>
                            <div class="col-md-2">
                              <input type="text" class="form-control timepicker"> </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="md md-event-available"></i></span>
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control datepicker-from"> </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control datepicker-until"> </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="form-group filled-static">
                        <label for="inputEmail" class="control-label">HTML date picker</label>
                        <input type="date" class="form-control"> </div>
                      <div class="form-group filled-static">
                        <label for="inputEmail" class="control-label">HTML month picker</label>
                        <input type="month" class="form-control"> </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
            <div class="row m-b-40" id="select2-and-typeahead">
              <div class="col-md-3 col-md-push-9">
                <h5>Select2 and typeahead variations</h5>
                <p><a target="_blank" href="https://select2.github.io/">Select2</a> is an powerful component to use relation data in your admin or application.</p>
                <p><a target="_blank" href="https://github.com/bassjobsen/Bootstrap-3-Typeahead">Typeahead</a> is a lightweight select replacement</p>
              </div>
              <div class="col-md-8 col-md-pull-3">
                <div class="well white">
                  <form class="form">
                    <fieldset>
                      <legend>Select</legend>
                      <div class="form-group">
                        <label class="control-label">Select2</label>
                        <select class="select2 form-control"></select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Select2 multiple</label>
                        <select class="select2-tags form-control" multiple=""></select>
                      </div>
                      <br>
                      <div class="form-group">
                        <label><i class="md md-keyboard"></i> Typeahead</label>
                        <input type="text" class="form-control typeahead" placeholder="Enter state" data-provide="typeahead" autocomplete="off"> </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
            <div class="row m-b-40" id="fileupload">
              <div class="col-md-3 col-md-push-9">
                <h5>File upload</h5>
                <p>Lightweight <a target="_blank" href="https://blueimp.github.io/jQuery-File-Upload/">jQuery File Upload</a> to upload files.</p>
              </div>
              <div class="col-md-8 col-md-pull-3">
                <div class="well white">
                  <form class="form">
                    <fieldset>
                      <legend class="m-b-10">File upload</legend>
                      <div>
                        <div class="form-group"> <span class="btn btn-info fileinput-button">                <span>Upload with button</span>
                          <input type="file" name="files[]" multiple="" class="fileupload"> </span>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Upload with form element</label>
                          <input type="file" name="file" accept="image/*"> </div>
                        <div class="form-group">
                          <label class="control-label">Upload with drag drop</label>
                          <div class="drop-box">Select or Drop Images here</div>
                        </div>
                        <ul style="clear:both" class="response list-unstyled"></ul>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
            <div class="row m-b-40" id="wysiwyg">
              <div class="col-md-3 col-md-push-9">
                <h5>Text editor</h5>
                <p><a target="_blank" href="https://github.com/summernote/summernote">summernote</a> is a super cool WYSIWYG Text Editor for Bootstrap.</p>
              </div>
              <div class="col-md-8 col-md-pull-3">
                <div class="well white">
                  <form class="form">
                    <fieldset>
                      <legend>Text editor</legend>
                      <div class="wysiwyg"></div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
            <div class="row m-b-40" id="noui-slider">
              <div class="col-md-3 col-md-push-9">
                <h5>Sliders</h5>
                <p><a target="_blank" href="http://refreshless.com/nouislider/">noUiSlider</a> is a range slider without bloat. It offers a ton off features, and it is as small, lightweight and minimal as possible, which is great for mobile use on the many supported devices, including iPhone, iPad, Android devices &amp; Windows (Phone) 8 desktops, tablets and all-in-ones. It works on desktops too, of course!</p>
              </div>
              <div class="col-md-8 col-md-pull-3">
                <div class="well white">
                  <form class="form">
                    <fieldset>
                      <legend>Sliders</legend>
                      <div class="form-group">
                        <label class="control-label">Standard slider</label>
                        <div class="slider-1"></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label">With bind</label>
                        <div class="slider-2 noUi-range"></div> <span class="help-block">Value from slider: <span class="sliderval"></span> / <span class="sliderval2"></span></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label">With indicator</label>
                        <div class="slider-3"></div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </section>