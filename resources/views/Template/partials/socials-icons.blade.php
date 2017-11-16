<div class="row">

    <p class="text-center margin-bottom-3">
        Or Login with
    </p>

    <div class="col-md-12 margin-bottom-2 text-center">
        <a href="{{ route('facebook.login',['provider' => 'facebook']) }}" class="btn btn-social-icon btn-lg margin-half btn-facebook">
          <i class="fa fa-facebook"></i>
        </a>
        <a href="{{ route('linkedin.login',['provider' => 'linkedin']) }}" class="btn btn-social-icon btn-lg margin-half btn-linkedin">
          <i class="fa fa-linkedin"></i>
        </a>
        <a href="{{ route('google.login',['provider' => 'google']) }}" class="btn btn-social-icon btn-lg margin-half btn-google">
          <i class="fa fa-google"></i>
        </a>
    </div>
</div>
