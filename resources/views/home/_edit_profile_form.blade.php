{!! Form::model($user,["route"=>["editProfile"], "method"=>'put', 'class'=>'form-horizontal' , 'id'=>'profile_edit_form']) !!}
                        <div class="form-group">
                            <label class="col-md-3">About Me:</label>
                            <div class="col-md-9">
                                {!! Form::textarea("aboutMe", isset($user[0]) ? $user[0]['about_me'] : '', ['class'=>"form-control", 'rows'=>'4']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Email Address:</label>
                            <div class="col-md-9">
                                {!! Form::text("email", isset($user[0]) ? $user[0]['email'] : '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Mobile</label>
                            <div class="col-md-9">
                                {!! Form::text("mobile", isset($user[0]) ? $user[0]['mobile'] : '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Data of Birth:</label>
                            <div class="col-md-9">
                                {!! Form::input("date","dob", isset($user[0]) ? $user[0]['dob'] : '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">What's your Rashi?</label>
                            <div class="col-md-9">
                                <select class="form-control" name="rashi">
                                    <option value="">{{ isset($user[0]) ? $user[0]['rashi'] : 'Select...' }}</option>
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
                                {!! Form::text("state", isset($user[0]) ? $user[0]['state'] : '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                         <div class="form-group">
                             <label class="col-md-3">City:</label>
                             <div class="col-md-9">
                                 {!! Form::text("city", isset($user[0]) ? $user[0]['city'] : '', ['class'=>'form-control']) !!}
                             </div>
                         </div>
                          <div class="form-group">
                              <label class="col-md-3">Website (if any):</label>
                              <div class="col-md-9">
                                  {!! Form::text("website", isset($user[0]) ? $user[0]['website'] : '', ['class'=>'form-control']) !!}
                              </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3"></label>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button class="btn btn-danger btn-lg">Cancel</button>
                          </div>
                    {!! form::close() !!}