<?php
use Dsheiko\Extras\Arrays;

describe("\\Dsheiko\\Extras\\Arrays (Underscore\Collections)", function() {

    beforeEach(function() {
        $this->fixtureStooges = [
            ["name" => "moe", "age" => 40],
            ["name" => "larry", "age" => 50],
            ["name" => "curly", "age" => 60],
        ];
    });


    describe("::partition", function() {

        it("splits target into 2 arrays (positive and nagative filters)", function() {
            $res = Arrays::partition([0, 1, 2, 3, 4, 5], function($val) {
                    return $val % 2;
                });
            expect(implode(",", $res[0]))->to->equal("1,3,5");
            expect(implode(",", $res[1]))->to->equal("0,2,4");
        });
    });


    describe("::pluck", function() {

        it("extract values array", function() {
            $res = Arrays::pluck($this->fixtureStooges, "name");
            expect(implode(",", $res))->to->equal("moe,larry,curly");
        });
    });

    describe("::where", function() {

        it("returns elements compling callback condition", function() {
            $arr = ["foo" => "FOO", "bar" => "BAR", "baz" => "BAZ"];
            $res = Arrays::where($arr, ["foo" => "FOO", "bar" => "BAR"]);
            expect(implode(",", array_keys($res)))->to->equal("foo,bar");
        });

        it("returns still an array when matches found", function() {
            $arr = ["foo" => "FOO", "bar" => "BAR", "baz" => "BAZ"];
            $res = Arrays::where($arr, ["foo" => "BAR"]);
            expect($res)->to->be->a("array");
        });
    });

    describe("::groupBy", function() {

        it("splits collection into sets", function() {
            $res = Arrays::groupBy([1.3, 2.1, 2.4], function($num) {
                    return floor($num);
                });
            expect(json_encode($res))->to->equal('{"1":[1.3],"2":[2.1,2.4]}');
        });
    });

    describe("::countBy", function() {

        it("it sorts a list into groups and returns a count for the number of objects in each group.", function() {
            $res = Arrays::countBy([1, 2, 3, 4, 5], function($num) {
                    return $num % 2 == 0 ? "even" : "odd";
                });
            expect(json_encode($res))->to->equal('{"odd":3,"even":2}');
        });
    });

    describe("::shuffle", function() {

        it("returns a shuffled copy of the list", function() {
            $res = Arrays::shuffle([1, 2, 3, 4, 5]);
            expect(implode(",", $res))->not->to->equal("1,2,3,4,5");
        });
    });


    describe('::findWhere', function() {

        it("returns matching pairs", function() {
            $src = [
                [
                    "foo" => "FOO",
                    "bar" => "BAR",
                    "baz" => "BAZ",
                ],
                [
                    "bar" => "BAR",
                    "baz" => "BAZ",
                ],
                [
                    "baz" => "BAZ",
                ]
            ];
            $res = Arrays::findWhere($src, [
                    "foo" => "FOO",
                    "bar" => "BAR",
            ]);
            expect($res)->to->equal($src[0]);
        });
    });

    describe('::reject', function() {

        it("returns not matching pairs", function() {
            $res = Arrays::reject([1, 2, 3, 4, 5, 6], function ($num) {
                    return $num % 2 == 0;
                });
            expect($res)->to->equal([1, 3, 5]);
        });
    });

    describe('::invoke', function() {

        it("applys callable on every element of the array", function() {
            $res = Arrays::invoke([[5, 1, 7], [3, 2, 1]], [Arrays::class, "sort"]);
            expect($res[0])->to->equal([1, 5, 7]);
            expect($res[1])->to->equal([1, 2, 3]);
        });
    });

    describe('::max', function() {

        it("finds max without iteratee", function() {
            $res = Arrays::max([1, 2, 3]);
            expect($res)->to->equal(3);
        });

        it("finds max with iteratee", function() {
            $res = Arrays::max($this->fixtureStooges, function($stooge) {
                    return $stooge["age"];
                });
            expect($res["age"])->to->equal(60);
            expect($res["name"])->to->equal("curly");
        });

        it("finds max with iteratee and with context", function() {
            $context = (object) ["modifier" => -1];
            $res = Arrays::max([
                    ["foo" => 1],
                    ["foo" => 2]
                    ], function($item) {
                    return $item["foo"] * $this->modifier;
                }, $context);
            expect($res["foo"])->to->equal(1);
        });
    });

    describe('::min', function() {

        it("finds min without iteratee", function() {
            $res = Arrays::min([1, 2, 3]);
            expect($res)->to->equal(1);
        });

        it("finds min with iteratee", function() {
            $res = Arrays::min($this->fixtureStooges, function($stooge) {
                    return $stooge["age"];
                });
            expect($res["age"])->to->equal(40);
            expect($res["name"])->to->equal("moe");
        });

        it("finds min with iteratee and with context", function() {
            $context = (object) ["modifier" => -1];
            $res = Arrays::min([
                    ["foo" => 1],
                    ["foo" => 2]
                    ], function($item) {
                    return $item["foo"] * $this->modifier;
                }, $context);
            expect($res["foo"])->to->equal(2);
        });
    });

    describe('::sortBy', function() {

        it("sorts with iteratee", function() {
            $res = Arrays::sortBy([1, 2, 3, 4, 5, 6], function($a) {
                    return \sin($a);
                });
            expect($res)->to->equal([5, 4, 6, 3, 1, 2]);
        });

        it("sorts with key", function() {
            $res = Arrays::sortBy($this->fixtureStooges, "name");
            expect($res[0]["name"])->to->equal("curly");
            expect($res[1]["name"])->to->equal("larry");
        });

        it("sorts with iteratee", function() {
            $res = Arrays::sortBy([1, 1, 1, 1, 1, 1], function($a) {
                    return \sin($a);
                });
                var_dump($res);
            //expect($res)->to->equal([5, 4, 6, 3, 1, 2]);
        });
    });

    describe("::countBy", function() {

        it("transforms array", function() {
            $res = Arrays::indexBy($this->fixtureStooges, "age");
            expect($res[40]["name"])->to->equal("moe");
        });
    });

    describe("::sample", function() {

        it("returns value when no count given", function() {
            $res = Arrays::sample([1, 2, 3]);
            expect(is_array($res))->not->to->be->ok;
        });

        it("returns array when count given", function() {
            $res = Arrays::sample([1, 2, 3], 3);
            expect(is_array($res))->to->be->ok;
        });
    });


    describe("::size", function() {

        it("returns size of assoc array", function() {
            $res = Arrays::size([
                    "one" => 1,
                    "two" => 2,
                    "three" => 3
            ]);
            expect($res)->to->equal(3);
        });
    });
});

