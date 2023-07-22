<?php

namespace OrdersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use OrdersBundle\Repository;;

use JwtBundle\Jwt;
use OrdersBundle\Entity\Sdu_Locations;
use OrdersBundle\Entity\Sdu_Orders;
use OrdersBundle\Entity\Mdu_Orders;
use OrdersBundle\Entity\Mdu_Locations;


class DefaultController extends Controller
{
    /**
     * @Route("/api/add-location", name="add-location")
     */
    public function addLocationAction(Request $request)
    {

        $jwt_manager = new JWT();
        $jwt = $jwt_manager->fetchJWT();
        $is_jwt_valid = $jwt_manager->validate_jwt($jwt);
        $input = ($request->getContent());
        $location_ref = json_decode($input)->location_ref;
        switch ($is_jwt_valid) {
            case true:

                switch (json_decode($input)->type) {
                    case 'sdu':
                        # code...
                        $unit = json_decode($input)->house_number;

                        $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Locations");
                        // check duplicates
                        $location = new Sdu_Locations($input);


                        $duplicate_found = $sdu_repo->findDuplicate($location_ref, $unit);
                        if ($duplicate_found) {

                            echo "duplicate found";
                            return new JsonResponse('Could not insert, something went wrong', 500);

                            return new JsonResponse('duplicate found', 409);
                        } else {
                            echo "duplicate NOT found";
                            $entity_manager = $this->getDoctrine()->getManager();
                            $entity_manager->persist($location);
                            $entity_manager->flush();
                            return new JsonResponse('location added', 200);

                            // try {


                            // } catch (\Throwable $th) {
                            //     return new JsonResponse('Could not insert, something went wrong', 500);
                            // }
                        }
                        break;

                    case 'mdu':

                        # code...
                        $unit = json_decode($input)->unit_number;

                        $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Locations");
                        // check duplicates
                        $location = new Mdu_Locations($input);


                        $duplicate_found = $mdu_repo->findDuplicate($location_ref, $unit);
                        if ($duplicate_found) {
                            echo "duplicate found";
                            return new JsonResponse('duplicate found', 409);
                        } else {
                            //

                            try {
                                //code...
                                $entity_manager = $this->getDoctrine()->getManager();
                                $entity_manager->persist($location);
                                $entity_manager->flush();
                                // $is_inserted  = $mdu_repo->findOneBy(['mduUnit' => json_decode($input)->unit_number]);
                                return new JsonResponse('true', 200);
                            } catch (\Throwable $th) {
                                //throw $th;
                                return new JsonResponse('Could not insert, something went wrong', 500);
                            }
                        }
                        break;
                    default:
                        break;
                }
                break;
            case false:
                return new JsonResponse('invalid', 401);
                break;
        }
    }


    /**
     * @Route("api/place-order", name="place-order",defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR","ROLE_ISP_USER"}})
     */

    public function placeOrderAction(Request $request)
    {

        $input = ($request->getContent());
        $product = $this->getDoctrine()->getRepository("OrdersBundle:Products")->find(json_decode($input)->product);
        switch (json_decode($input)->location_type) {
            case 'sdu':
                # code...


                //code...
                $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Orders");
                $order = new Sdu_Orders($input, $product);
                // echo "Order ID will be ". json_decode($order)->get;

                // check duplicates
                $duplicate_found = $sdu_repo->findDuplicateOrder($order);
                $counter = $sdu_repo->countEntries() + 1;
                $serialzed_order_number = 'SDU-';
                $order_number = $serialzed_order_number . str_pad($counter, 5, '0', STR_PAD_LEFT);
                $order->setOrderNumber($order_number);


                if ($duplicate_found) {


                    return new JsonResponse($order_number, 409);
                } else {

                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($order);
                    $entity_manager->flush();
                    return new JsonResponse($order_number, 200);
                }

                //throw $th;
                // return new JsonResponse('Something went wrong while placing order', 500);

                break;

            case 'mdu':
                # code...
                $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Orders");
                $order = new Mdu_Orders($input, $product);
                $duplicate_found = $mdu_repo->findDuplicateOrder($order);
                $counter = $mdu_repo->countEntries() + 1;
                $serialzed_order_number = 'MDU-';
                $order_number = $serialzed_order_number . str_pad($counter, 5, '0', STR_PAD_LEFT);
                $order->setOrderNumber($order_number);

                if ($duplicate_found) {


                    return new JsonResponse($order_number, 409);
                } else {

                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($order);
                    $entity_manager->flush();
                    return new JsonResponse($order_number, 200);
                }
                try {
                    //code...

                } catch (\Throwable $th) {
                    return new JsonResponse('Something went wrong while placing mdu order', 500);

                    //throw $th;
                }

                break;
        }
    }

    /**
     * Takes a search string and location type 
     * Returns a list of the results matching the search string.
     * 
     * @Route("api/find-location/", name="find-location", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR","ROLE_ISP_USER"}} )
     */
    public function findLocationAction(Request $request)
    {

        $dataJson = $request->query->get('data');
        $input =  json_encode(json_decode($dataJson));
        $location_type = Json_decode($input)->type;
        $searchString = Json_decode($input)->searchString;
        $searchParts = explode(",", $searchString);
        $mdu_name = $searchParts[0];
        if (!empty($surburb)) {
            $surburb = trim($searchParts[1]);
        } else {
            $surburb = "";
        }

        $unit = $mdu_name;
        $index_of_space = strpos($mdu_name, ' ');
        $unit = trim(substr_replace($unit, ' ', $index_of_space));
        $mdu_name = trim(substr_replace($mdu_name, '', 0, $index_of_space + 1));
        switch ($location_type) {
            case 'sdu':
                # code...
                $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Locations");
                // echo $surburb."\n";
                // echo $mdu_name."\n";
                // echo $unit;
                $sdulocation = $sdu_repo->findLocationWithSearchString($unit, $mdu_name, $surburb);

                return new JsonResponse($sdulocation, 200);
                // try {

                // } catch (\Throwable $th) {
                //     return new JsonResponse("Something went wrong", 500);
                // }
                break;

            case 'mdu':
                # code...
                try {
                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Locations");
                    $location = $mdu_repo->findLocationWithSearchString($unit, $mdu_name, $surburb);

                    return new JsonResponse($location, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse("Something went wrong", 500);
                }





                break;
        }
    }

    /**
     * This function retrieves the list of products as an array 
     * Then proceeds to cache the result
     * 
     * @Route("api/products/", name="products", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR","ROLE_ISP_USER"}} )
     */
    public function fetchProductsAction()
    {
        try {
            //code...
            $product_repo = $this->getDoctrine()->getRepository("OrdersBundle:Products");
            $products = $product_repo->fetchProducts();
            return new JsonResponse($products, 200);
        } catch (\Throwable $th) {
            return new JsonResponse($th, 500);
        }
    }

    /**
     * This function recieves a order number, massages the data
     * and returns the instance linked to the given order number.
     *  @Route("/api/order-status/", name="order-status", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR","ROLE_ISP_USER"}})
     */
    public function orderStatusAction(Request $request)
    {
        $dataJson = $request->query->get('data');
        $input =  json_encode(json_decode($dataJson));
        $order_type = Json_decode($input)->order_type;
        // echo $order_type;
        switch ($order_type) {
            case 'SDU':
                # code...
                $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Orders");
                $order = $sdu_repo->findOrder(Json_decode($input)->order_number);
                if (empty($order)) {
                    return new JsonResponse("Order not found", 500);

                    // echo "tis empty bru";
                }

                return new JsonResponse($order, 200);

                break;

            case 'MDU':
                # code...
                $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Orders");
                $order = $mdu_repo->findOrder(Json_decode($input)->order_number);
                if (empty($order)) {
                    return new JsonResponse("Order not found", 500);
                }

                return new JsonResponse($order, 200);
                break;

            default:
                return new JsonResponse('Invalid order Format', 500);
        }
    }
    /**
     * Accepts a order object, extracts the order number 
     * And has this rejected, given that it is in a pending state.
     * 
     *
     *  @Route("api/reject-order", name="reject-order", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR","ROLE_ISP_USER"}})
     * 
     */
    public function rejectOrderAction(Request $request)
    {

        $input = $request->getContent();
        $content = json_decode($input)->params->updates[0]->value;
        $location_type = json_decode($content)->location_type;
        $order_number = json_decode($content)->order_number;
        switch ($location_type) {
            case 'sdu' | 'SDU':
                # code...

                try {
                    //code...
                    $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Orders");
                    $result = $sdu_repo->rejectOrder($order_number);
                    return new JsonResponse($result, 200);
                } catch (\Throwable $th) {
                    //throw $th;
                    return new JsonResponse('Could not reject order', 500);
                }


                break;

            case 'mdu' | 'MDU':
                try {
                    //code...
                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Orders");
                    $result = $mdu_repo->rejectOrder($order_number);
                    return new JsonResponse($result, 200);
                } catch (\Throwable $th) {
                    //throw $th;
                    return new JsonResponse('Could not reject order', 500);
                }

                break;

            default:
                break;
        }
    }

    /**
     * Retrieves orders based on the type we are intersted in.
     * Types: Active Orders, Pending Orders, Awaiting Installation.
     * 
     * @Route("api/retrieve-orders/", name="retrieve-orders", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR"}})
     */
    public function retrieveOrdersAction(Request $request)
    {
        $input = $request->query->get('data');
        $type = json_decode($input)->type;
        $page = json_decode($input)->page;

        switch ($type) {
            case 'sdu':
                # code...
                try {
                    //code...
                    $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Orders");
                    $orders = $sdu_repo->retrieveOrders($type, $page);
                    return new JsonResponse($orders, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('The order type provided is incorrect', 500);
                }
                
                break;
            
            case 'mdu':
                # code...
                try {
                    //code...
                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Orders");
                    $orders = $mdu_repo->retrieveOrders($type, $page);
                    return new JsonResponse($orders, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('The order type provided is incorrect', 500);
                }
                break;

                case 'regrade':
                    try {
                        //code...
                        $regrade_repo = $this->getDoctrine()->getRepository("ServicesBundle:Regrade");
                        $orders = $regrade_repo->retrieveRegradeOrders($type, $page);
                        return new JsonResponse($orders, 200);
                    } catch (\Throwable $th) {
                        return new JsonResponse('The order type provided is incorrect', 500);
                    }

                    break;
        }
        // try {
        //     //code...
        //     $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Orders");
        //     $orders = $sdu_repo->retrieveOrders($type, $page);
        //     return new JsonResponse($orders, 200);
        // } catch (\Throwable $th) {
        //     return new JsonResponse('The order type provided is incorrect', 500);
        // }
        return new JsonResponse('Something went wrong', 500);

    }

    /**
     * Accepts a order object, extracts the order number 
     * And has thisupdated according to the new data.
     * 
     *
     *  @Route("api/edit-order", name="edit-order", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR"}})
     * 
     */
    public function editOrderAction(Request $request)
    {

        $input = $request->getContent();
        $content = json_decode($input)->params->updates[0]->value;
        // echo "Content is". json_encode($content);
        $location_type = json_decode($content)->location_type;
        switch ($location_type) {

            case 'sdu':
                # code...
                $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Orders");
                $result = $sdu_repo->editOrder(json_decode($content));
                return new JsonResponse($result, 200);

                // try {
                //     //code...

                // } catch (\Throwable $th) {
                //     //throw $th;
                //     return new JsonResponse('Could not edit SDU order', 500);
                // }


                break;

            case 'mdu':
                try {
                    //code...
                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Orders");
                    $result = $mdu_repo->editOrder(json_decode($content));
                    return new JsonResponse($result, 200);
                } catch (\Throwable $th) {
                    //throw $th;
                    return new JsonResponse('Could not edit MDU order', 500);
                }

                break;

            default:
                break;
        }
    }

    /**
     * Retrieves Locations based on the type we are intersted in.
     * Types: SDU - Single Dwelling Units(houses)
     *        MDU - Multi Dwelling Complex
     * @Route("api/fetch-locations/", name="fetch-locations", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR"}})
     */
    public function fetchLocationsAction(Request $request)
    {
        $input = $request->query->get('data');
        $type = json_decode($input)->type;
        $page = json_decode($input)->page;
        switch ($type) {
            case 'sdu':
                # code...
                $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Locations");
                $location = $sdu_repo->fetchLocations($type, $page);
                return new JsonResponse($location, 200);
                // try {
                //     //code...

                // } catch (\Throwable $th) {
                //     return new JsonResponse('The order type provided is incorrect', 500);
                // }
                break;

            case 'mdu':
                # code...
                try {
                    //code...
                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Locations");
                    $location = $mdu_repo->fetchLocations($type, $page);
                    return new JsonResponse($location, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('The order type provided is incorrect', 500);
                }
                break;
        }
    }
    /**
     * Retrieves Units based on the Street and Suburub.
     * Types: SDU - Single Dwelling Units(houses)
     *        MDU - Multi Dwelling Complex
     * @Route("api/fetch-units/", name="fetch-units", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR"}})
     */
    public function fetchUnitsAction(Request $request)
    {
        $input = $request->query->get('data');
        // $type = json_decode($input)->location_type;
        // $page = json_decode($input)->page;
        $type = json_decode($input)->location_type;
        $surburb = json_decode($input)->surburb;


        switch ($type) {
            case 'sdu':
                # code...
                $street = json_decode($input)->street_name;

                $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Locations");
                $location = $sdu_repo->fetchUnits($street, $surburb);
                return new JsonResponse($location, 200);
                // try {
                //     //code...

                // } catch (\Throwable $th) {
                //     return new JsonResponse('The order type provided is incorrect', 500);
                // }
                break;

            case 'mdu':
                # code...
                try {
                    //code...
                    $mdu_name = json_decode($input)->mdu_name;

                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Locations");
                    $location = $mdu_repo->fetchUnits($mdu_name, $surburb);
                    return new JsonResponse($location, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('The order type provided is incorrect', 500);
                }
                break;
        }
    }
    /**
     * Retrieves Units based on the ID and location type.
     * Types: SDU - Single Dwelling Units(houses)
     *        MDU - Multi Dwelling Complex
     * @Route("api/location-id/", name="location-id", defaults={"req_roles":{"ROLE_FNO_ADMIN","ROLE_ISP_USER", "ROLE_CREATOR"}})
     */
    public function locationByIdAction(Request $request)
    {
        $input = $request->query->get('data');
        $location_id = json_decode($input)->location_id;
        $type = json_decode($input)->location_string;


        switch ($type) {
            case 'sdu':
                # code...


                try {
                    //code...  
                    $sdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Sdu_Locations");
                    $location = $sdu_repo->findLocationById($location_id);
                    return new JsonResponse($location, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('The location type provided is incorrect', 500);
                }
                break;

            case 'mdu':
                # code...
                try {
                    //code...
                    $mdu_name = json_decode($input)->mdu_name;

                    $mdu_repo = $this->getDoctrine()->getRepository("OrdersBundle:Mdu_Locations");
                    $location = $mdu_repo->findLocationById($location_id);
                    return new JsonResponse($location, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('The location type provided is incorrect', 500);
                }
                break;
        }
    }
}
