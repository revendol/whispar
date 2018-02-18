<div class="content-wrapper">
    <div class="" id="card">
        <div class="text-area">
            <textarea name="" id="status_text_area" class="form-control" cols="30" rows="5" placeholder="Share your thoughts...."></textarea>
        </div>
        <div class="choice-box">
            <div class="left-button">
                <label for="" class="attachment-option" title="image"><i class="fas fa-image"></i></label>
                <label for="" class="attachment-option" title="File"><i class="fas fa-file"></i></label>
            </div>
            <div class="right-button">
                <div class="dropdown share-dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listeners
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://tr.com/home"><i class="fa fa-globe"></i> &nbsp;Everyone</a>
                        <a class="dropdown-item" href="http://tr.com/member/my-profile"><i class="fa fa-user"></i> &nbsp;Roomates</a>
                        <a class="dropdown-item" href="http://tr.com/member/my-profile"><i class="fa fa-users"></i> &nbsp;Friends</a>
                    </div>
                </div>
                <input type="submit" value="Shout" class="btn btn-info">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="posts-wrapper">
        <div class="row">
            <div class="col-xs-12">
                <div class="poster-div">
                    <div class="poster-pic-div">
                        <img src="/img/tim_80x80.png" alt="Poseter" class="poster-pic">
                    </div>
                    <div class="poster-info">
                        <h3 class="poster-name">Radoan Hossain</h3>
                        <p class="post-date">17 Feb, 2018 11:19 PM</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="post">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div class="like-comment-div">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#status_text_area').focus(function (e) {
        $('#card').addClass('card');
    });
    $('#status_text_area').focusout(function (e) {
        $('#card').removeClass('card');
    });
</script>