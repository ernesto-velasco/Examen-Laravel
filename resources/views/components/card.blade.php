<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @includeIf('components.flashdata')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  {{ $header }}
                </div>
                <div class="card-body">
                  {{ $body }}
                </div>
            </div>
        </div>
    </div>
  </div>