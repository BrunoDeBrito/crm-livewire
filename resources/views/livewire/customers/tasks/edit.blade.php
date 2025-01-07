<div class="flex items-start gap-2 justify-between">
    @if($editing)
        <form class="pt-1 pb-3 flex items-start gap-2 w-full" wire:submit="save">
            <div class="w-full">
                <x-input
                    wire:model="task.title"
                    class="input-xs input-ghost "
                />
                <x-select
                    icon="o-user"
                    :options="$this->users"
                    wire:model="selectedUser"
                    class="select-xs"
                />
            </div>
            <div class="flex items-center gap-2">
                <x-button type="button" wire:click="$set('editing', 0)" class="btn-xs btn-ghost">{{ __('Cancel') }}</x-button>
                <x-button type="submit" class="btn-xs btn-ghost">{{ __('Save') }}</x-button>
            </div>
        </form>
    @else
        <div class="flex gap-2 items-center">
            <button wire:sortable.handle title="{{ __('Drag to reorder') }}" class="cursor-grab">
                <x-icon name="o-queue-list" class="w-4 h-4 -mt-px opacity-30"/>
            </button>
            <input id="task-{{ $task->id }}" wire:click="toggleCheck('done')" type="checkbox" value="1" @if($task->done_at) checked @endif />
            <label for="task-{{ $task->id }}">{{ $task->title }}</label>
            <div class="text-xs italic opacity-30">assigned to: {{ $task->assignedTo?->name }}</div>
        </div>
        <div class="flex items-start gap-2">
            <button title="{{ __('Edit Task') }}" class="cursor-pointer" wire:click="$set('editing', true)">
                <x-icon name="o-pencil" class="w-4 h-4 -mt-px opacity-30 hover:opacity-100 hover:text-primary"/>
            </button>

            <button title="{{ __('Delete task') }}" class="cursor-pointer" wire:click="deleteTask()">
                <x-icon name="o-trash" class="w-4 h-4 -mt-px opacity-30 hover:opacity-100 hover:text-error"/>
            </button>
        </div>
    @endif
</div>
