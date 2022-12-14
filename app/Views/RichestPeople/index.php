<?php
$data = $data ?? [];
require_once APPROOT . "/Models/RichestPeopleModel.php";
require_once APPROOT . '/Views/Includes/header.php';
?>


<div class="mt-4">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Richest People</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the Richest People in the world.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Networth</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Age</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Company</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <?php foreach ($data['richestPeople'] as $richestPeople): ?>

                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo $richestPeople->Name?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo $richestPeople->Networth ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo $richestPeople->Age ?></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo $richestPeople->MyCompany ?? "Geen plaats opgeven!" ?></td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="<?= URLROOT ?>/richestpeople/show/<?php echo $richestPeople->Id ?>" class="text-indigo-600 hover:text-indigo-900">Show<span class="sr-only"></span></a>
                                    <a href="<?= URLROOT ?>/richestpeople/delete/<?php echo $richestPeople->Id ?>" class="text-indigo-600 hover:text-indigo-900">Delete<span class="sr-only"></span></a>
                                
                                </td>

                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

