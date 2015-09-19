{!! Form::open(["route"=>["createQuestion"], "method"=>'put', 'class'=>'form-horizontal' ,'files'=>true, 'id'=>'ask_question']) !!}
                            <div class="form-group">
                               <label class="col-md-2">Question Title<span class="red">*</span> :</label>
                                 <div class="col-md-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                      {!! Form::text("title", null, ['class'=>"form-control"]) !!}
                                      {!! $errors->first('title', '<span class="help-block">:message</span> ' ) !!}
                                 </div>
                            </div>

                            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                               <label class="col-md-2">Question Tags<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                 {!! form::text("tags", null, ['class'=>'form-control','placeholder'=>'for example: #science #technology etc...']) !!}
                                 {!! $errors->first('tags', '<span class="help-block">:message</span> ' ) !!}
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
                               <label class="col-md-2">Attachment:</label>
                                 <div class="col-md-10">
                                     {!! Form::file("file", ['class'=>'form-control']) !!}
                                 </div>
                            </div>

                            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                               <label class="col-md-2">Description<span class="red">*</span> :</label>
                                 <div class="col-md-10">
                                      {!! Form::textarea("content", null, ['class'=>'form-control', 'data-msg'=>'Description is required']) !!}
                                      {!! $errors->first('content', '<span class="help-block">:message</span> ') !!}
                                 </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2"></div>
                                {!! Form::submit("Publish Question", ["class"=>"btn btn-success btn-lg"]) !!}
                            </div>
                        {!! form::close() !!}