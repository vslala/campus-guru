{!! Form::model($user,["route"=>["editProfile"], "method"=>'put', 'class'=>'form-horizontal' , 'id'=>'profile_edit_form']) !!}
                        <div class="form-group">
                            <label class="col-md-3">About Me:</label>
                            <div class="col-md-9">
                                {!! Form::textarea("aboutMe", $user[0]['about_me'] or '', ['class'=>"form-control", 'rows'=>'4']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Email Address:</label>
                            <div class="col-md-9">
                                {!! Form::text("email", $user[0]['email'] or '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Mobile</label>
                            <div class="col-md-9">
                                {!! Form::text("mobile", $user[0]['mobile'], ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Data of Birth:</label>
                            <div class="col-md-9">
                                {!! Form::input("date","dob", $user[0]['dob'] or '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">What's your Rashi?</label>
                            <div class="col-md-9">
                                <select class="form-control" name="rashi">
                                    <option value="">Select...</option>
                                    <option value="Aries">Aries</option>
                                    <option value="Taurus">Taurus</option>
                                    <option value="Gemini">Gemini</option>
                                    <option value="Cancer">Cancer</option>
                                    <option value="Leo">Leo</option>
                                    <option value="Virgo">Virgo</option>
                                    <option value="Libra">Libra</option>
                                    <option value="Scorpio">Scorpio</option>
                                    <option value="Sagittarius">Sagittarius</option>
                                    <option value="Capricon">Capricon</option>
                                    <option value="Aqarius">Aqarius</option>
                                    <option value="Pisces">Pisces</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">State:</label>
                            <div class="col-md-9">
                                {!! Form::text("state", $user[0]['state'] or '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                         <div class="form-group">
                             <label class="col-md-3">City:</label>
                             <div class="col-md-9">
                                 {!! Form::text("city", $user[0]['city'] or '', ['class'=>'form-control']) !!}
                             </div>
                         </div>
                          <div class="form-group">
                              <label class="col-md-3">Website (if any):</label>
                              <div class="col-md-9">
                                  {!! Form::text("website", $user[0]['website'] or '', ['class'=>'form-control']) !!}
                              </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3"></label>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    {!! form::close() !!}