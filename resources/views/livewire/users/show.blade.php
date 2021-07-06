<div>
<div class="d-flex justify-content-end mb-2">
  <button type="button" wire:click.prevent="createUser" class="btn btn-primary">
    <i class="fa fa-plus-circle mr-1"></i> Add User
  </button>
</div>
    <!-- /.card-header -->
    
    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info" style="width:100%   ">
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Options</th>
      </thead>
      <tbody>
        @if($users)
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>
          @livewire('toggle-switch', ['model'=>$user, 'field'=>'status'], key("{{$user->id}}"))
          </td>
          <td>{{$user->created_at}}</td>
          <td class="text-center">
          <a href=""  wire:click.prevent="confirmUserRemoval({{$user->id}})"  class="btn btn-danger btn-sm">
          <i class="fa fa-trash text-white"></i> Delete
          </a>
          <a href="" wire:click.prevent="editUser({{$user}})" class="btn btn-primary btn-sm">
          <i class="fa fa-edit text-white"></i> Edit
          </a>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  <!-- /.card-body -->
<div>
<!-- Add Model -->
<div class="fade modal" id="show-model" style="display: none;" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form wire:submit.prevent="{{($isEdit)?'saveUserChanges':'saveUser'}}">
      <div class="modal-header">
        <h4 class="modal-title">{{($isEdit)?'Edit User':'Add User'}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name </label>
              <input type="text" wire:model.differ="state.name"  class="form-control @error('name')is-invalid @enderror"  placeholder="Enter Name">
              @error('name')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" class="form-control @error('email')is-invalid @enderror" wire:model.differ="state.email" placeholder="Enter Email" >
              @error('email')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input type="text" class="form-control @error('email')is-invalid @enderror" wire:model.differ="state.phone" placeholder="Enter Phone" >
              @error('phone')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control @error('password')is-invalid @enderror" wire:model.differ="state.password" placeholder="Password" >
              @error('password')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm</label>
              <input type="password" class="form-control" wire:model.differ="state.password_confirmation" placeholder="Password" >
            </div>
          </div>
          <!-- /.card-body -->

      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        @if($isEdit)
        <button type="submit" class="btn btn-primary">Save changes</button>
        @else
        <button type="submit" class="btn btn-primary">Save</button>
        @endif
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Edit Model -->
<div class="fade modal" id="delete-model" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Delete User</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Are you sure you want to delete this user?</h1>
       </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger">
          <i class="fa fa-trash mr-1"></i> Delete
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
</div>