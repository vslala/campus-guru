{!! Form::open(["route"=>["createDiscussion"], "method"=>'put', 'class'=>'form-horizontal' , 'id'=>'profile_edit_form']) !!}
                            <div class="form-group">
                               <label class="col-md-2">Discussion Title<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                      {!! Form::text("title", null, ['class'=>"form-control"]) !!}
                                 </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-2">Discussion Tags<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                 {!! form::text("tags", null, ['class'=>'form-control']) !!}
                                 <span class="help-block">for example: #science #technology etc...</span>
                                 </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-2">Category<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                      <select class="form-control" name="category">
                                        <option>Select...</option>
                                        <option name="">Some Category</option>
                                      </select>
                                 </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-2">Description<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                      {!! Form::textarea("description", null, ['class'=>'form-control']) !!}
                                      <span class="help-block">What is the discussion all about.</span>
                                 </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-2"></div>
                                {!! Form::submit("Start Discussion", ["class"=>"btn btn-success btn-lg"]) !!}
                            </div>
                        {!! form::close() !!}