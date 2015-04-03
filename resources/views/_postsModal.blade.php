
<!--Posts modal-->
<div id="myPostModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">My Posts</h2>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="h4">My Questions</div>
                        </div>
                        <div class="panel-body text-center">
                            <a href="{{ route('userQuestions') }}" class="btn btn-lg btn-primary">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                              <div class="h4">My Discussions</div>
                        </div>
                        <div class="panel-body text-center">
                            <a href="#" class="btn btn-lg btn-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div><!-- Posts modal ends here -->