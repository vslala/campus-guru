@if(count($p) > 0)
@foreach($status as $s)
                            <ul class="nav nav-pills list-inline">
                                <li>
                                    <a href="{{ route("profileVisit", [
                                        $p[0]['username']
                                    ]) }}" >
                                        {!! Html::image($dp[0]['image_url'], $dp[0]['image_name'], ['class'=>'img img-thumbnail img-responsive', 'style'=>'height: 100px;']) !!}
                                    </a>


                                </li>
                                <li style="margin-top: 2%;"><span style="font-family: cursive,Lobster; font-weight: bold; color: #843534;">{{ $s->status or 'Status' }}</span>
                                    <br>
                                    <div class="help-block">created at: {{ $s->created_at }}</div>
                                 </li>

                                <hr>
                            </ul>
@endforeach
@endif