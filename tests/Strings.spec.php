<?php
use Dsheiko\Extras\Strings;

describe("\\Dsheiko\\Extras\\Strings", function() {

    describe('::substr', function() {

        it("extracts substring from given position", function() {
            $res = Strings::substr("12345", 1);
            expect($res)->to->equal("2345");
        });

        it("extracts substring from given position and of given length", function() {
            $res = Strings::substr("12345", 1, 3);
            expect($res)->to->equal("234");
        });

    });

    describe('::trim', function() {

        it("strips string of whitespaces", function() {
            $res = Strings::trim("  12345   ");
            expect($res)->to->equal("12345");
        });

        it("strips string of given character", function() {
            $res = Strings::trim("...12345....", ".");
            expect($res)->to->equal("12345");
        });

    });

    describe('::replace', function() {

        it("modifies string by following a given PCRE", function() {
            $res = Strings::replace("12345", "/\d/s", "*");
            expect($res)->to->equal("*****");
        });

    });

    describe('::endsWith', function() {

        it("confirms string ends with given substring", function() {
            $res = Strings::endsWith("12345", "45");
            expect($res)->to->be->ok;
        });

        it("denies string ends with given substring", function() {
            $res = Strings::endsWith("12345", "12");
            expect($res)->not->to->be->ok;
        });

    });

    describe('::startsWith', function() {

        it("confirms string starts with given substring", function() {
            $res = Strings::startsWith("12345", "12");
            expect($res)->to->be->ok;
        });

        it("denies string starts with given substring", function() {
            $res = Strings::startsWith("12345", "45");
            expect($res)->not->to->be->ok;
        });

    });

    describe('::includes', function() {

        it("confirms string includes given substring", function() {
            $res = Strings::includes("12345", "23");
            expect($res)->to->be->ok;
        });

        it("denies string includes given substring", function() {
            $res = Strings::includes("12345", "89");
            expect($res)->not->to->be->ok;
        });

    });

    describe('::includes', function() {

        it("removes substring from string", function() {
            $res = Strings::remove("12345", "23");
            expect($res)->to->equal("145");
        });

        it("does not change string when no match found", function() {
            $res = Strings::remove("12345", "89");
            expect($res)->to->equal("12345");
        });

    });


     describe('::fromCharCode', function() {

        it("return string created from char codes", function() {
            $res = Strings::fromCharCode(65, 66, 67);
            expect($res)->to->equal("ABC");
        });

    });

    describe('::charAt', function() {

        it("return char at given position", function() {
            $res = Strings::charAt("ABC", 0);
            expect($res)->to->equal("A");
            $res = Strings::charAt("ABC", 1);
            expect($res)->to->equal("B");
        });

        it("return empty string when range overflow", function() {
            $res = Strings::charAt("ABC", 999);
            expect($res)->to->equal("");
        });

    });

    describe('::charCodeAt', function() {

        it("return char code at given position", function() {
            $res = Strings::charCodeAt("ABC", 0);
            expect($res)->to->equal(65);
        });

    });

    describe('::concat', function() {

        it("concatenates the string arguments", function() {
            $res = Strings::concat("AB", "CD", "EF");
            expect($res)->to->equal("ABCDEF");
        });

    });

     describe('::indexOf', function() {

        it("returns the index without offset", function() {
            $res = Strings::indexOf("ABCD", "BC");
            expect($res)->to->equal(1);
        });

        it("returns the index with offset", function() {
            $res = Strings::indexOf("ABCABC", "BC", 3);
            expect($res)->to->equal(4);
        });

        it("returns -1 when not found", function() {
            $res = Strings::indexOf("ABCABC", "ZBC");
            expect($res)->to->equal(-1);
        });

    });

    describe('::lastIndexOf', function() {

        it("returns the index without offset", function() {
            $res = Strings::lastIndexOf("canal", "a");
            expect($res)->to->equal(3);
        });

        it("returns the index with offset", function() {
            $res = Strings::lastIndexOf("canal", "a", 2);
            expect($res)->to->equal(1);
        });

        it("returns -1 when offset 0", function() {
            $res = Strings::lastIndexOf("canal", "a", 0);
            expect($res)->to->equal(-1);
        });

        it("returns -1 when not found", function() {
            $res = Strings::lastIndexOf("canal", "x");
            expect($res)->to->equal(-1);
        });

    });

    describe('::localeCompare', function() {

        it("returns number indicating sort order", function() {
            \setlocale (LC_COLLATE, 'de_DE');
            $res = Strings::localeCompare("a", "c");
            expect($res)->to->equal(-2);
        });

    });

    describe('::match', function() {

        it("returns array of matches when found", function() {
            $res = Strings::match("A1B1C1", "/[A-Z]/");
            expect(count($res))->to->equal(3);
        });

        it("returns null when not found", function() {
            $res = Strings::match("A1B1C1", "/zzz/");
            expect($res)->to->equal(null);
        });

    });

     describe('::padEnd', function() {

        it("pads without pad string", function() {
            $res = Strings::padEnd("abc", 10);
            expect($res)->to->equal("abc       ");
        });

        it("pads with pad string", function() {
            $res = Strings::padEnd("abc", 10, "foo");
            expect($res)->to->equal("abcfoofoof");
        });

    });

     describe('::padStart', function() {

        it("pads without pad string", function() {
            $res = Strings::padStart("abc", 10);
            expect($res)->to->equal("       abc");
        });

        it("pads with pad string", function() {
            $res = Strings::padStart("abc", 10, "foo");
            expect($res)->to->equal("foofoofabc");
        });

    });




    describe('::chain', function() {

        it("chains different methods", function() {
           $res = Strings::chain( " 12345 " )
            ->replace("/1/", "5")
            ->replace("/2/", "5")
            ->trim()
            ->substr(1, 3)
            ->value();
            expect($res)->to->equal("534");
        });

        it("throws exception when invalid type given", function() {
            expect(function() {
                Strings::chain([1,2]);
            })->to->throw(\InvalidArgumentException::class, "Target must be a string; 'array' type given");
        });

    });


});

