package main

import (
	"cache"
	"fmt"
	"time"
)

func main() {
	defaultExpiration, _ := time.ParseDuration("0.5h")
	gcInterval, _ := time.ParseDuration("3s")
	c := cache.NewCache(defaultExpiration, gcInterval)

	k1 := "hello shiyanlou"
	expiration, _ := time.ParseDuration("5s")

	c.Set("k1", k1, expiration)
	s, _ := time.ParseDuration("10s")
	if v, found := c.Get("k1"); found {
		fmt.Println("Found k1: ", v)
	} else {
		fmt.Println("Not found k1")
	}
	// 暂停 10s
	time.Sleep(s)
	// 现在 k1 应该被清理掉了
	if v, found := c.Get("k1"); found {
		fmt.Println("Found k1: ", v)
	} else {
		fmt.Println("Not found k1")
	}
}
