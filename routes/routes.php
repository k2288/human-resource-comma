<?php

use Illuminate\Support\Facades\Route;
use Raahin\HumanResource\Http\Controllers\Education\EducationController;
use Raahin\HumanResource\Http\Controllers\EmergencyContact\EmergencyContactController;
use Raahin\HumanResource\Http\Controllers\Experience\ExperienceController;
use Raahin\HumanResource\Http\Controllers\Profile\ProfileController;

Route::name("hr.")->middleware(["api", "auth:api"])->prefix("api/hr/")->group(function () {
    //        logged-in user information
    Route::get("/profile", [ProfileController::class, "profile"])->name("profile");
    Route::get("/experience", [ExperienceController::class, "experience"])->name("experience");
    Route::get("/education", [EducationController::class, "education"])->name("education");
    Route::get("/emergency-contact", [EmergencyContactController::class, "emergencyContact"])
        ->name("emergency-contact");

    Route::name("user.")->prefix("/user")->group(function () {

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

        //        users educations routes
        Route::get("/{user}/education", [EducationController::class, "index"])
            ->name("education.index");
        Route::post("/{user}/education", [EducationController::class, "store"])
            ->name("education.store");
        Route::get("/{user}/education/{education}", [EducationController::class, "show"])
            ->name("education.show");
        Route::put("/{user}/education/{education}", [EducationController::class, "update"])
            ->name("education.update");
        Route::delete("/{user}/education/{education}", [EducationController::class, "destroy"])
            ->name("education.destroy");

        //        users emergency contacts routes
        Route::get("/{user}/emergency-contact", [EmergencyContactController::class, "index"])
            ->name("emergency-contact.index");
        Route::post("/{user}/emergency-contact", [EmergencyContactController::class, "store"])
            ->name("emergency-contact.store");
        Route::get("/{user}/emergency-contact/{emergencyContact}", [EmergencyContactController::class, "show"])
            ->name("emergency-contact.show");
        Route::put("/{user}/emergency-contact/{emergencyContact}", [EmergencyContactController::class, "update"])
            ->name("emergency-contact.update");
        Route::delete("/{user}/emergency-contact/{emergencyContact}", [EmergencyContactController::class, "destroy"])
            ->name("emergency-contact.destroy");


    });
});
