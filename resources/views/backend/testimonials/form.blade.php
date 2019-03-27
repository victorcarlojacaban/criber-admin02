<div class="box-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-8 col-md-8 col-sm-8">
              <div class="form-group">
                    {{ Form::label('tenant_name', 'Name', ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-lg-10">
                        {{ Form::text('tenant_name', null, ['class' => 'form-control box-size', 'placeholder' => 'Tenant name', 'required' => 'required']) }}
                    </div><!--col-lg-3-->
                </div><!--form control-->
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="form-group">
                    {{ Form::label('message', 'Message', ['class' => 'col-lg-2 col-md-2 col-sm-2 control-label required']) }}
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        {{ Form::textArea('message', null, ['class' => 'form-control box-size', 'placeholder' => 'Short Message', 'required' => 'required']) }}
                    </div>
                </div>
            </div>

             <div class="col-lg-8 col-md-8 col-sm-8">
                 <div class="form-group">
                 {{ Form::label('image_url', 'Tenant Image', ['class' => 'col-lg-2 control-label required']) }}
                 @if(!empty($testimonials->image_url))
                        <div class="col-lg-3">
                         {{ $testimonials->image_url }}<br/>
                        </div>
                        <div class="col-lg-5">
                            <div class="custom-file-input">
                                <input type="file" name="image_url" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                                <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-5">
                            <div class="custom-file-input">
                                <input type="file" name="image_url" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                                <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                            </div>
                        </div>
                    @endif
                </div><!--form control-->
            </div>

             <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="form-group">
                    {{ Form::label('testimonial_video', 'Tenant testimonial', ['class' => 'col-lg-2 col-md-2 col-sm-2 control-label required']) }}
                    <div class="col-lg-5">
                        <div class="custom-file-input">
                            <input type="file" name="video_url" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                            <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--box-body-->

@section("after-scripts")
    @section("after-scripts")
    <script type="text/javascript">

        Backend.Blog.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.Blog.selectors.SlugUrl = "{{url('/')}}";
        Backend.Blog.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');

    </script>
@endsection
@endsection
