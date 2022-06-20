<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MusicianTest extends TestCase
{
    protected function base_response($data)
    {
        return [
            "meta" => [
                "code" => 200,
                "status" => "success",
                "message" => "Success"
            ],
            "data" => $data
        ];
    }
    

    public function test_get_noParams()
    {
        $this->seed();
        $this->json('GET', 'api/musicians', ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJson($this->base_response([
            "current_page" => 1,
            "data" => [
              [
                "id" => 1,
                "user_id" => 1,
                "instrument" => "Gitar",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "",
                "location" => "Bandung, Indonesia",
                "full_name" => "John Doe",
                "phone" => "082211339988",
                "email" => "johndoe@gmail.com",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 2,
                "user_id" => 2,
                "instrument" => "Piano",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "A musician",
                "location" => "Jakarta, Indonesia",
                "full_name" => "Jane Doe",
                "phone" => "081133009944",
                "email" => "janedoe@gmail.com",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/luwadlin-bosman-pD1KUHCZ9Yc-unsplash.jpg?alt=media&token=6b131ed9-81f2-4ecc-b881-75e966dcf52d",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 3,
                "user_id" => 3,
                "instrument" => "Vokal",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.",
                "location" => "Nangewer",
                "full_name" => "Germana McQuode",
                "phone" => "5894605646",
                "email" => "gmcquode0@addtoany.com",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 4,
                "user_id" => 4,
                "instrument" => "Bass",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.",
                "location" => "Rumenka",
                "full_name" => "Anson Cloutt",
                "phone" => "7384665800",
                "email" => "acloutt1@reddit.com",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 5,
                "user_id" => 5,
                "instrument" => "Other",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.",
                "location" => "Nàng Mau",
                "full_name" => "Padriac Iacovides",
                "phone" => "2817196164",
                "email" => "piacovides2@hhs.gov",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 6,
                "user_id" => 6,
                "instrument" => "Perkusi",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque.",
                "location" => "Reno",
                "full_name" => "Lyndsey Truss",
                "phone" => "7028212376",
                "email" => "ltruss3@skyrock.com",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 7,
                "user_id" => 7,
                "instrument" => "Strings",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit.",
                "location" => "Cañasgordas",
                "full_name" => "Colene Ingry",
                "phone" => "4296155167",
                "email" => "cingry4@tamu.edu",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ],
              [
                "id" => 8,
                "user_id" => 8,
                "instrument" => "Vokal",
                "likes" => 0,
                "created_at" => null,
                "updated_at" => null,
                "about" => "Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.",
                "location" => "Kananya",
                "full_name" => "Larissa Ranvoise",
                "phone" => "8609878306",
                "email" => "lranvoise5@arizona.edu",
                "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                "liked_by" => [
        
                ]
              ]
            ],
            "first_page_url" => "http://127.0.0.1:8000/api/musicians?page=1",
            "from" => 1,
            "last_page" => 2,
            "last_page_url" => "http://127.0.0.1:8000/api/musicians?page=2",
            "links" => [
              [
                "url" => null,
                "label" => "&laquo; Previous",
                "active" => false
              ],
              [
                "url" => "http://127.0.0.1:8000/api/musicians?page=1",
                "label" => "1",
                "active" => true
              ],
              [
                "url" => "http://127.0.0.1:8000/api/musicians?page=2",
                "label" => "2",
                "active" => false
              ],
              [
                "url" => "http://127.0.0.1:8000/api/musicians?page=2",
                "label" => "Next &raquo;",
                "active" => false
              ]
            ],
            "next_page_url" => "http://127.0.0.1:8000/api/musicians?page=2",
            "path" => "http://127.0.0.1:8000/api/musicians",
            "per_page" => 8,
            "prev_page_url" => null,
            "to" => 8,
            "total" => 10
          ]));
    }

    public function test_get_hasInstrumentParam()
    {
        $this->seed();
        $this->json('GET', 'api/musicians?instrument=Other', ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJson($this->base_response([
                "current_page" => 1,
                "data" => [
                  [
                    "id" => 5,
                    "user_id" => 5,
                    "instrument" => "Other",
                    "likes" => 0,
                    "created_at" => null,
                    "updated_at" => null,
                    "about" => "Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.",
                    "location" => "Nàng Mau",
                    "full_name" => "Padriac Iacovides",
                    "phone" => "2817196164",
                    "email" => "piacovides2@hhs.gov",
                    "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                    "liked_by" => [
            
                    ]
                  ]
                ],
                "first_page_url" => "http://127.0.0.1:8000/api/musicians?page=1",
                "from" => 1,
                "last_page" => 1,
                "last_page_url" => "http://127.0.0.1:8000/api/musicians?page=1",
                "links" => [
                  [
                    "url" => null,
                    "label" => "&laquo; Previous",
                    "active" => false
                  ],
                  [
                    "url" => "http://127.0.0.1:8000/api/musicians?page=1",
                    "label" => "1",
                    "active" => true
                  ],
                  [
                    "url" => null,
                    "label" => "Next &raquo;",
                    "active" => false
                  ]
                ],
                "next_page_url" => null,
                "path" => "http://127.0.0.1:8000/api/musicians",
                "per_page" => 8,
                "prev_page_url" => null,
                "to" => 1,
                "total" => 1
          ]));
    }

    public function test_get_hasKeywordParam()
    {
        $this->seed();
        $this->json('GET', 'api/musicians?keyword=padriac', ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJson($this->base_response([
                "current_page" => 1,
                "data" => [
                  [
                    "id" => 5,
                    "user_id" => 5,
                    "instrument" => "Other",
                    "likes" => 0,
                    "created_at" => null,
                    "updated_at" => null,
                    "about" => "Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.",
                    "location" => "Nàng Mau",
                    "full_name" => "Padriac Iacovides",
                    "phone" => "2817196164",
                    "email" => "piacovides2@hhs.gov",
                    "img_link" => "https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f",
                    "liked_by" => [
            
                    ]
                  ]
                ],
                "first_page_url" => "http://127.0.0.1:8000/api/musicians?page=1",
                "from" => 1,
                "last_page" => 1,
                "last_page_url" => "http://127.0.0.1:8000/api/musicians?page=1",
                "links" => [
                  [
                    "url" => null,
                    "label" => "&laquo; Previous",
                    "active" => false
                  ],
                  [
                    "url" => "http://127.0.0.1:8000/api/musicians?page=1",
                    "label" => "1",
                    "active" => true
                  ],
                  [
                    "url" => null,
                    "label" => "Next &raquo;",
                    "active" => false
                  ]
                ],
                "next_page_url" => null,
                "path" => "http://127.0.0.1:8000/api/musicians",
                "per_page" => 8,
                "prev_page_url" => null,
                "to" => 1,
                "total" => 1
          ]));
    }

    public function test_get_isNotFirstPage()
    {
        $this->json('GET', 'api/musicians?page=2', ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonFragment([
            "current_page" => 2,
        ]);
    }
}
