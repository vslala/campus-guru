                        <div class="pull-right">
                            {!! Form::open(["route"=>["search"], "method"=>'get', 'class'=>'form-inline', 'id'=>'search_form_for_q_n_d']) !!}
                                                <input type="hidden" value="{{ $showURL or '' }}" name="showURL" id="show_url" />
                                                <input type="hidden" name="table" value="{{ $table or 'questions' }}" id="table_from"/>
                                                <input type="text" name="searchTerm" id="search_term" class="form-control">
                                                <a href="{{ route("dummy") }}" id="search_for_q_n_d" class="btn btn-primary" >Search</a>
                            {!! Form::close() !!}
                        </div>