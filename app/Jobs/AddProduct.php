<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Cloudinary;
use App\Repository\ProductVariableRepository;

class AddProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $value;
    private $productVariableRepository;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $value,
        ProductVariableRepository $productVariableRepository
    ) {
        $this->value = $value;
        $this->productVariableRepository = $productVariableRepository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $productVariations['img'] = Cloudinary::upload($this->value)->getSecurePath();

        $newProductVariableRepository = app(ProductVariableRepository::class)->create($productVariations);
    }
}
