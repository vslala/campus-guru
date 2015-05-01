<!-- Comment Section will start here -->
                                                        <section class="comment">
                                                            <div class="form-group">
                                                                <!-- Comments will be show here -->

                                                                <ul id="comments" class="list-group">
                                                                @if(isset($userComments[0]))
                                                                    @foreach($userComments as $comment)
                                                                        <li class="list-group-item">
                                                                            <div class="help-block">
                                                                                <span class="glyphicon glyphicon-time pull-right time">{{ $comment->created_at }}</span>
                                                                            </div>
                                                                            <a href="{{ route('profileVisit', $comment->username) }}">
                                         {!! Html::image($comment->image_url, $comment->image_name, ['class'=>'img img-responsive img-thumbnail', 'style'=>'height: 50px;']) !!}
                                                                            <span class="username">{{ $comment->username }}</span>
                                                                            </a>

                                                                            <p class="comment">{{  $comment->comment }}</p>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                                </ul>

                                                            </div>

                                                            <div class="form-group">
                                                                {!! Form::open(["route"=>["addBlogComment"], 'method'=>'POST', 'class'=>'form-inline', 'id'=>'blog_comment_form']) !!}
                                                                    <input type="hidden" value="{{ $blog[0]->id }}" name="blogID" />
                                                                    <div class="col-sm-8">
                                                                        <textarea class="form-control" name="blogComment" id="blogCommentTextField" rows="1" cols="40" ></textarea>
                                                                        @if(! isset($username))
                                                                             <div class="has-error help-block">
                                                                                     You must log in to post comment.
                                                                             </div>
                                                                             <div class="help-block">
                                                                                <a href="{{ route('index', '#login') }}">Login</a>
                                                                                <a href="{{ route('index', '#register_section') }}">Register</a>
                                                                             </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <button class="btn btn-primary btn-md" type="submit" id="blogCommentBtn" >comment</button>
                                                                    </div>

                                                                {!! Form::close() !!}
                                                            </div>
                                                        </section>
                                         <!-- Comments section ends here -->