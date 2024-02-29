@if($errors->any())
              <div class="alert alert-warning border-0 d-flex align-items-center" role="alert">
                <div class="bg-warning me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-6"></span></div>

                  @foreach($errors->all() as $error)
                  <li class="mb-0 flex-1">
                    {{$error}}
                  </li>

                  @endforeach
                
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif