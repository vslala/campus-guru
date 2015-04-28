
                                 <li>
                                    <ul class="list-inline">
                                        <a href="{{ route("updateLikeStatus", $s->id) }}" class="inline" id="statusLike">
                                            <span class="badge">{{ $s->likeCount or "0" }}</span>
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                        </a>
                                    &nbsp; | &nbsp;
                                        <a href="{{ route("updateDislikeStatus", $s->id)}}" class="inline" id="statusDislike">
                                            <span class="badge">{{ $s->dislikeCount or "0" }}</span>
                                            <span class="glyphicon glyphicon-thumbs-down"></span>
                                        </a>
                                    </ul>

                                 </li>