import React from "react";
import { Head } from "@inertiajs/inertia-react";
import SearchInput from "@/Components/SearchInput";

export default function Welcome(props) {
    return (
        <>
            <Head title="Welcome" />
            <div className="min-h-screen body sm:pt-0">
                <div className="p-10 py-12"></div>
                <div className="grid justify-items-center w-screen">
                    <h1 className="font-bold ml-18 text-4xl mb-4">
                        Simple Weather App
                    </h1>
                    <SearchInput />
                </div>
            </div>
        </>
    );
}
