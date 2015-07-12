{!! Form::open(["route"=>["createDiscussion"], "method"=>'put', 'class'=>'form-horizontal' , 'id'=>'profile_edit_form']) !!}
                            <div class="form-group">
                               <label class="col-md-2">Discussion Title<span class="red">*</span> :</label>
                                 <div class="col-md-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                      {!! Form::text("title", null, ['class'=>"form-control"]) !!}
                                      {!! $errors->first('title','<span class="help-block">:message</span> ') !!}
                                 </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-2">Discussion Tags<span class="red">*</span> :</label>
                                 <div class="col-md-10 {{ $errors->has('tags') ? 'has-error' : '' }}">
                                 {!! form::text("tags", null, ['class'=>'form-control', 'placeholder'=>'for example: #science #technology etc...']) !!}
                                 {!! $errors->first('tags','<span class="help-block">:message</span> ') !!}
                                 </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-2">Category<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                      <select class="form-control" name="category">
                                        @if(isset($categories))
                                            @foreach($categories as $c)
                                                <option value="{{ $c->name or null }}">{{ $c->name or '' }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                 </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-2">Description<span class="red">*</span> :</label>
                                 <div class="col-md-10 {{ $errors->has('description') ? 'has-error' : '' }}">
                                      {!! Form::textarea("description", null, ['class'=>'form-control text-editor', 'id'=>'text_editor', 'placeholder'=>'What is this discussion all about?']) !!}
                                      {!! $errors->first('description','<span class="help-block">:message</span> ') !!}
                                      <script>
                                      CKEDITOR.replace('description');
                                      </script>
                                 </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-2"></div>
                                {!! Form::submit("Start Discussion", ["class"=>"btn btn-success btn-lg", 'onclick'=>'parseTextFromIFrameAndSetTextInTextArea()']) !!}
                            </div>
                        {!! form::close() !!}