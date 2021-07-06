<div>
<div class="d-flex justify-content-end mb-2">
  <button type="button" wire:click.prevent="createCategory" class="btn btn-primary">
    <i class="fa fa-plus-circle mr-1"></i> Add Category
  </button>
</div>
    <!-- /.card-header -->
    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info" style="width:100%   ">
      <thead>
        <th>ID</th>
        <th>Link</th>
        <th>Title</th>
        <th>parent</th>
        <th>SortNo</th>
        <th>Status</th>
        <th>InHeader</th>
        <th>Options</th>
      </thead>
      <tbody>
        @if($categories)
        @foreach($categories as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->name}}</td>
          <td>{{$category->title}}</td>
          <td>
            @foreach($categories as $val)
            @if($category->parent_id==$val->id)
            {{$val->name}}
            @endif
            @endforeach
          </td>
          <td>{{$category->sort_no}}</td>
          <td>{{$category->status}}</td>
          <td>{{$category->inheader}}</td>
          <td class="text-center">
          <a href=""  wire:click.prevent="confirmCategoryRemoval({{$category->id}})"  class="btn btn-danger btn-sm">
          <i class="fa fa-trash text-white"></i> Delete
          </a>
          <a href="" wire:click.prevent="editCategory({{$category}})" class="btn btn-primary btn-sm">
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
    <form wire:submit.prevent="{{($isEdit)?'saveCategirtChanges':'saveCategory'}}">
      <div class="modal-header">
        <h4 class="modal-title">{{($isEdit)?'Edit Category':'Add Category'}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Link </label>
              <input type="text" wire:model.differ="state.name"  class="form-control @error('name')is-invalid @enderror"  placeholder="Link">
              @error('name')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Category Title</label>
              <input type="text" class="form-control @error('title')is-invalid @enderror" wire:model.differ="state.title" placeholder="Category Title" >
              @error('title')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Select Category Parent</label>
              <select class="form-control" wire:model.differ="state.parent_id">
              @if($isEdit)
              {{$state['parent_id']}}
              @endif
                <option value="">Select a parent</option>
                @foreach($categories as $cat)
                @if($cat->parent_id==0)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Category Status</label>
              <select class="form-control @error('status')is-invalid @enderror" wire:model.lazy="state.status" >
                <option selected value="1">Active</option>
                <option value="0">InActive</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Select Inheader</label>
              <select class="form-control @error('inheader')is-invalid @enderror" wire:model.lazy="state.inheader">
                <option selected  value="yes">Yes</option>
                <option value="">No</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
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
        <h1 class="modal-title">Delete Category</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Are you sure you want to delete this category?</h1>
       </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="deleteCategory" class="btn btn-danger">
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