<?php

use Illuminate\Support\Facades\Route;
use Raahin\HumanResource\Http\Controllers\Experience\ExperienceController;
use Raahin\HumanResource\Http\Controllers\Profile\ProfileController;

Route::middleware(["api"])->prefix("api/")->group(function () {


    Route::name("user.")->prefix("/user")->group(function () {

        //        users eager load with all relationship routes
        //        Route::get("/{user}/full-profile", [ProfileController::class, "index"])->name("full-profile");

        //        users profiles routes
        Route::get("/{user}/profile", [ProfileController::class, "show"])
            ->name("profile.show");
        Route::post("/{user}/profile", [ProfileController::class, "storeOrUpdate"])
            ->name("profile.save");
        Route::delete("/{user}/profile", [ProfileController::class, "destroy"])
            ->name("profile.destroy");

        //        users experience routes
        Route::get("/{user}/experience", [ExperienceController::class, "index"])
            ->name("experience.index");
        Route::post("/{user}/experience", [ExperienceController::class, "store"])
            ->name("experience.store");
        Route::get("/{user}/experience/{experience}", [ExperienceController::class, "show"])
            ->name("experience.show");
        Route::put("/{user}/experience/{experience}", [ExperienceController::class, "update"])
            ->name("experience.update");
        Route::delete("/{user}/experience/{experience}", [ExperienceController::class, "destroy"])
            ->name("experience.destroy");


    });
});
