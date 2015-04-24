<div class="col-sm-3 col-md-2">
            <a href="#" class="btn btn-danger btn-sm btn-block" role="button"><i class="glyphicon glyphicon-edit"></i> Compose</a>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li class="{{ $setInboxActive or '' }}"><a href="{{ route("messages") }}"><span class="badge pull-right">{{ $totalMessage or '' }}</span> Inbox </a>
                </li>
                {{--<li><a href="#">Starred</a></li>--}}
                {{--<li><a href="#">Important</a></li>--}}
                <li class="{{ $setSentActive or '' }}"><a href="{{ route("sentMessages") }}"><span class="badge pull-right">{{ $totalMessageSent or '' }}</span>Sent Mail</a></li>
                {{--<li><a href="#"><span class="badge pull-right">3</span>Drafts</a></li>--}}
            </ul>
        </div>