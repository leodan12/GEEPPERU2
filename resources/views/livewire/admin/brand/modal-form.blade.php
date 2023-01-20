<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Agregar Marcas</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
      <div class="modal-body">
        <div class="mb-3">
            <label>Nombre de la Marca</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name') <small class="text-danger">{{$message}}</small> @enderror
            
        </div>
        <div class="mb-3">
            <label>Slug de la Marca</label>
            <input type="text" wire:model.defer="slug" class="form-control">
            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label> <br/>
            <input type="checkbox" wire:model.defer="status" /> Marcar=Oculto, Sin Marcar= Visible
            @error('status') <small class="text-danger">{{$message}}</small> @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>

    </div>
  </div>
</div>    

<!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Actualizar Marca</h5>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading class="p-2">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>Loading...
      </div>
      <div wire:loading.remove>

      
      <form wire:submit.prevent="updateBrand">
      <div class="modal-body">
        <div class="mb-3">
            <label>Nombre de la Marca</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name') <small class="text-danger">{{$message}}</small> @enderror
            
        </div>
        <div class="mb-3">
            <label>Slug de la Marca</label>
            <input type="text" wire:model.defer="slug" class="form-control">
            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label> <br/>
            <input type="checkbox" wire:model.defer="status" style="width:70px;height=70px;"/> Marcar=Oculto, Sin Marcar= Visible
            @error('status') <small class="text-danger">{{$message}}</small> @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>    

<!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Eliminar Marca</h5>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading class="p-2">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>Loading...
      </div>
      <div wire:loading.remove>

      
      <form wire:submit.prevent="destroyBrand">
      <div class="modal-body">
        <h4>¿Esta seguro de borrar los datos?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Si.Eliminar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>    